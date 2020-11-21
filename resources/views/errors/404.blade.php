<html>

<style>
body{
    font-family: "Courier New", sans-serif;
    font-size: larger;
}

    .container {
        margin: 10rem auto;
        width: 35%;
        border: 1px solid black;
        padding: 20px 40px 40px 40px;
    }

    a{
        text-decoration: none;
        border: 1px solid black;
        padding: 5px 7px;
    }

    a:hover{
        background-color: black;
        color: white;
    }

    .back{
        text-align: center;
    }
</style>

<body>
<div class="container">
    <div>
        <h2>Oh oh! This page doesn't exists! </h2>
        <hr>
        <br>
        <p>I think you misspelled something. Or i did a mistake while programming. Who knows...</p>
        <p>Best you go back to all the questions. They're waiting to be answered by a wise person like you!</p>
        <br>
        <div class="back">
            <a href="{{route('questions.index')}}">To the Questions!</a>
        </div>
    </div>
</div>
</body>
</html>
