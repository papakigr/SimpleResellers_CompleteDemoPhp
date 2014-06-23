Papaki Complete Demo Php
===========================
 
 

Εγκατάσταση
------------

.. code-block:: bash

  	To script αυτόματά την αναζήτηση domain  επιτρεπει στον χρήστη να πατήσει 'κατοχύρωση' των ονομάτων 
  	χώρου που επιθυμεί αφού συμπληρώσει τα απαραίτητα στοιχεία σε μια φόρμα. Τα στοιχεία αυτά στέλνονται
  	με email σε εσάς.

    Αρχείο config.php
    $admin_email = "test@gmail.com";//Place your Email here
    $url = "ok.html"; // Place the url of the page you want to redirect after the form is //submitted successfully
    $Papaki_apikey="myapikey";//place your apikey here
    
Test environment
----------------

.. code-block:: bash

    Αν θέλετε πρώτα να τεστάρετε το script σε test environment τότε μπορείτε να κάνετε τις εξής αλλαγές στο config.php:
    Βάλτε το apikey του test environment και αλλάξτε το papaki_Post_url σε https://api-test.papaki.gr/register_url2.aspx
    
    
 

System Requirements
-------------------
* Το   APIKey είναι απαραίτητο για να καλέσετε το  API του Papaki



Copyright
---------
Papaki
