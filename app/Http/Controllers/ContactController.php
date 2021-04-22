<?php

namespace App\Http\Controllers;

use App\Mail\Contact as MailContact;
use App\Mail\NotificationContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function takeContact(Request $request){

        $contact = new Contact();
        $contact->nom = $request->nom;
        $contact->prenom = $request->prenom;
        $contact->mail = $request->mail;
        $contact->numeroTel = $request->tel;
        $contact->sujet = $request->sujet;
        $contact->message = $request->message;
        $contact->cgu = $request->cgu;
        $saved = $contact->save();

        if($saved){
            // envoi d'un mail de confirmation d'envoi de son message
            Mail::to($request->mail)->send(new MailContact($contact));
            // notification sur ma boite mail perso
            Mail::to(env("MAIL_NOTIFICATION_ADDRESS", "davy.beauzil82@gmail.com"))->send(new NotificationContact($contact));
            return Redirect::route('contact', ['message' => 'Votre message a bien été envoyé', 'class' => 'success']);
        }else{
            return Redirect::route('contact', ['message' => 'Une erreur est survenue lors de l\'envoi de votre message', 'class' => 'success']);
        }

    }
}
