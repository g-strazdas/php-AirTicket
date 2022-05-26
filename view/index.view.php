<!doctype html>
<html lang="lt">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Aerouosto bilietas</title>
</head>
<body>
<div class="container">
    <?php
    if(isset($_POST['save'])){
//        echo "<h2>Formos duomenys</h2>";
        var_dump($_POST);
            foreach ($_POST as $value){
                echo "<li>$value</li>";
            }
        foreach ($_POST as $key=>$value){
            if($key !='save'){
                echo "<li>$value</li>";
            }
        }
        echo $_POST['sourceAirport'];

    }
    ?>

    <h2>Skrydžio planavimas</h2>
    <form method="post">
        <div class="form-group mb-3">
            <select name="sourceAirport" class="form-control">
                <option selected disabled>--Pasirinkite išvykimo aerouostą--</option>
                <?php foreach ($cities as $cID => $cValue):?>
                    <option value="<?=$cValue;?>"><?=$cValue.' '.strtoupper($cID);?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <select name="destinationAirport" class="form-control">
                <option selected disabled>--Pasirinkite atvykimo aerouostą--</option>
                <?php foreach ($cities as $cID => $cValue):?>
                    <option value="<?=$cValue;?>"><?=$cValue.' '.strtoupper($cID);?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <select name="flightNr" class="form-control">
                <option selected disabled>--Pasirinkite skrydžio numerį--</option>
                <?php foreach ($flights as $fNr):?>
                    <option value="<?=$fNr;?>"><?=$fNr;?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <select name="price" class="form-control">
                <option selected disabled>--Kaina--</option>
                <?php foreach ($prices as $fPrice):?>
                    <option value="<?=$fPrice;?>"><?=$fPrice.' eur.';?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <select name="luggageWeight" class="form-control">
                <option selected disabled>--Pasirinkite bagažo svorį--</option>
                <?php foreach ($weight as $lKg):?>
                    <option value="<?=$lKg;?>"><?=$lKg.' Kg';?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <input type="text" class="form-control" name="firstName" placeholder="Vardas">
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="lastName" placeholder="Pavarde">
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="idNumber" placeholder="Asmens kodas">
        </div>
        <div class="form-group mb-3">
             <input type="textarea" class="form-control" name="notes" rows="3"></textarea>
        </div>

        <button class="btn btn-primary" name="save">Saugoti</button>
    </form>
</div>
<p><?php var_dump($weight);?></p>
<?php foreach ($weight as $lKg):?>
    <p><?= var_dump($lKg);?></p>
<?php endforeach;?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
