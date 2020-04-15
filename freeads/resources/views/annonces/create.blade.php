<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    annonce crea


    @if(count($errors) > 0 )
    
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    
    @endif
  

    <form method="POST" action="{{ route('store.annonces') }}" enctype="multipart/form-data">
        @csrf
        <label for="titre">titre</label><input value="" type="texte" name="titre" id="">
        <label for="description">description</label><input value="" type="text" name="description" id="">
        <label for="prix">prix</label><input value="" type="text" name="prix" id="">
        <label for="couleur">couleur</label><input value="" type="text" name="couleur" id="">
        <label for="ville">ville</label><input value="" type="text" name="ville" id="">
        <label for="gouts">gouts</label><input value="" type="text" name="gouts" id="">
        <label for="photo"></label><input value="" type="file" name="photo">
        <button type="submit">Submit</button>

    </form>
</body>

</html>