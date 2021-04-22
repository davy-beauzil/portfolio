<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $contact->sujet }} veut vous contacter</title>
</head>
<body>
  <div class="box">
    <div>
      <h1 class="title">{{ $contact->prenom }} veut vous contacter</h1>
    </div>
    <div>
      <p>Nom : {{ $contact->nom }}</p>
      <p>Prénom : {{ $contact->prenom }}</p>
      <p>Mail : {{ $contact->mail }}</p>
      <p>Téléphone : {{ $contact->numeroTel }}</p>
      <p>Sujet : {{ $contact->sujet }}</p>
      <p>Message : <br> {{ $contact->message }}</p><br>
      <p>Message envoyé le : {{ $contact->created_at }}</p>
    </div>
    
  </div>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&display=swap');
    *{
      font-family: 'Hind', sans-serif;
    }
    body{
      display: flex;
      justify-content: center;
    }
    .box{
      background-color: white;
      max-width: 1000px;
      width: calc(100% - 20px);
    }
    .title{
      font-weight: bold;
      border: 0;
      display: inline-block;
      color: #212121;
      z-index: -1;
    }
  </style>
</body>
</html>