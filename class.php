package com.example.dalelidwaai.ui;

import android.app.Activity;
import android.app.Dialog;
import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.speech.RecognizerIntent;
import android.text.Html;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.inputmethod.InputMethodManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.example.dalelidwaai.R;
import com.example.dalelidwaai.model.Medication;

import java.util.ArrayList;
import java.util.HashMap;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import static android.app.Activity.RESULT_OK;
import static com.example.dalelidwaai.ui.GlobalVars.BASE_REQ_URL;
import static com.example.dalelidwaai.ui.GlobalVars.DEFAULT_LANG_POS;
import static com.example.dalelidwaai.ui.GlobalVars.LANGUAGE_CODES;
import static com.example.dalelidwaai.ui.QueryUtils.LOG_TAG;



public class MedicationDetailsFragment extends Fragment {
    private static final int REQ_CODE_SPEECH_INPUT = 1;

    TextView name, dosage, store, contraindications,use;
    TextView Dosage, Store, Contraindications;
    private Spinner mSpinnerLanguageFrom;
    private Spinner mSpinnerLanguageTo;
    private String mLanguageCodeFrom = "en";
    private String mLanguageCodeTo = "er";
    volatile boolean activityRunning;
    Button mButtonTranslate;
    // private Dialog process_tts;
    HashMap<String, String> map = new HashMap<>();


    private Medication medication;

    public View onCreateView(@NonNull LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View root = inflater.inflate(R.layout.fragment_medicine_information, container, false);

        return root;
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
        name = view.findViewById(R.id.name);
        dosage = view.findViewById(R.id.dosage);
        use = view.findViewById(R.id.use);
        store = view.findViewById(R.id.store);
        contraindications = view.findViewById(R.id.contraindications);
        mSpinnerLanguageFrom=view.findViewById(R.id.spinner_language_from);
        mSpinnerLanguageTo=view.findViewById(R.id.spinner_language_to);
        //Store = view.findViewById(R.id.Store);
        //Dosage = view.findViewById(R.id.Dosage);
        //Contraindications = view.findViewById(R.id.Contraindications);
        mButtonTranslate=view.findViewById(R.id.translate_btn);
        ImageView mImageSwap = (ImageView) view.findViewById(R.id.image_swap);


        this.medication = getArguments().getParcelable("medicine");

        name.setText(Html.fromHtml(medication.getName()));
        dosage.setText(Html.fromHtml(medication.getDosage()));
        use.setText(Html.fromHtml(medication.getUses()));
        store.setText(Html.fromHtml(medication.getStore()));
        contraindications.setText(Html.fromHtml(medication.getContraindications()));
        hideKeyboard(getActivity());

        //  CHECK INTERNET CONNECTION
        if (isOnline()) {
            new GetLanguages().execute();
            //  TRANSLATE
            mButtonTranslate.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    String input = use.getText().toString();
                    new TranslateText().execute(input);
                }
            });
            mImageSwap.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    String temp = mLanguageCodeFrom;
                    mLanguageCodeFrom = mLanguageCodeTo;
                    mLanguageCodeTo = temp;
                    int posFrom = mSpinnerLanguageFrom.getSelectedItemPosition();
                    int posTo = mSpinnerLanguageTo.getSelectedItemPosition();
                    mSpinnerLanguageFrom.setSelection(posTo);
                    mSpinnerLanguageTo.setSelection(posFrom);
                    String textFrom = use.getText().toString();
                    // String textTo = mTextTranslated.getText().toString();
                    use.setText(textFrom);
                    // mTextTranslated.setText(textFrom);
                }
            });

            //  SPINNER LANGUAGE FROM
            mSpinnerLanguageFrom.setEnabled(false);

            //  SPINNER LANGUAGE TO
            mSpinnerLanguageTo.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
                @Override
                public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                    mLanguageCodeTo = LANGUAGE_CODES.get(position);
                }
                @Override
                public void onNothingSelected(AdapterView<?> parent) {
                    Toast.makeText(getActivity().getApplicationContext(), "No option selected", Toast.LENGTH_SHORT).show();
                }
            });
        }





    }

    //  CHECK INTERNET CONNECTION
    public  boolean isOnline() {
        try {
            ConnectivityManager connectivityManager = (ConnectivityManager)getActivity().getApplicationContext().getSystemService(Context.CONNECTIVITY_SERVICE);
            NetworkInfo networkInfo = connectivityManager.getActiveNetworkInfo();
            return networkInfo != null && networkInfo.isAvailable() && networkInfo.isConnected();
        } catch (Exception e) {
            Log.e(LOG_TAG, e.getMessage());
        }
        return false;
    }

    public static void hideKeyboard(Activity activity) {
        InputMethodManager imm = (InputMethodManager) activity.getSystemService(Activity.INPUT_METHOD_SERVICE);
        //Find the currently focused view, so we can grab the correct window token from it.
        View view = activity.getCurrentFocus();
        //If no view currently has focus, create a new one, just so we can grab a window token from it
        if (view == null) {
            view = new View(activity);
        }
        imm.hideSoftInputFromWindow(view.getWindowToken(), 0);
    }

    //  SUBCLASS TO TRANSLATE TEXT ON BACKGROUND THREAD
    private class TranslateText extends AsyncTask<String,Void,String> {
        @Override
        protected String doInBackground(String... input) {
            Uri baseUri = Uri.parse(BASE_REQ_URL);
            Uri.Builder uriBuilder = baseUri.buildUpon();
            uriBuilder.appendPath("translate")
                    .appendQueryParameter("key",getString(R.string.API_KEY))
                    .appendQueryParameter("lang",mLanguageCodeFrom+"-"+mLanguageCodeTo)
                    .appendQueryParameter("text",input[0]);
            Log.e("String Url ---->",uriBuilder.toString());
            return QueryUtils.fetchTranslation(uriBuilder.toString());
        }

        //************************* asole
        @Override
        protected void onPostExecute(String result) {
            if(activityRunning) {
                use.setText(result);
            }
        }
    }

    //  SUBCLASS TO GET LIST OF LANGUAGES ON BACKGROUND THREAD
    private class GetLanguages extends AsyncTask<Void,Void,ArrayList<String>> {
        @Override
        protected ArrayList<String> doInBackground(Void... params) {
            Uri baseUri = Uri.parse(BASE_REQ_URL);
            Uri.Builder uriBuilder = baseUri.buildUpon();
            uriBuilder.appendPath("getLangs")
                    .appendQueryParameter("key", getString(R.string.API_KEY))
                    .appendQueryParameter("ui", "en");
            Log.e("String Url ---->", uriBuilder.toString());
            return QueryUtils.fetchLanguages(uriBuilder.toString());
        }

        @Override
        protected void onPostExecute(ArrayList<String> result) {
            if (activityRunning) {
                ArrayAdapter<String> adapter = new ArrayAdapter<>(getActivity(), android.R.layout.simple_spinner_item, result);
                adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
                mSpinnerLanguageFrom.setAdapter(adapter);
                mSpinnerLanguageTo.setAdapter(adapter);
                //  SET DEFAULT LANGUAGE SELECTIONS
                mSpinnerLanguageFrom.setSelection(DEFAULT_LANG_POS);
                mSpinnerLanguageTo.setSelection(DEFAULT_LANG_POS);
            }
        }
    }

}
