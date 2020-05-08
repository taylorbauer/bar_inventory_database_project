<!DOCTYPE html>
<html>

<head>
    <link href="myStyle.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <title>Create New Recipe</title>

</head>

<body>
    <h1>Create New Recipe</h1>
    <p>Hang tight, will be adding liquor ingredients in the next step</p>
    <form id="Recipe" action="RecipeSuccess.php" method="post">

        <p>Recipe name: <input id="name" name="name" type="text"></p>
        <p>Glass: <input id="glass" name="glass" type="text"></p>
        <p>Method: <input id="method" name="method" type="text"></p>
        <p>Additional Ingredients: <input id="additional_ingredients" name="additional_ingredients" type="text"></p>

        <input type="submit">
    </form>
    <form><button type="submit" formaction="index.html">Back to Home</button></form>
</body>

</html>