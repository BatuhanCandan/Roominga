<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Decision Tree Generator</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="css/site.css" rel="stylesheet">

</head>
<body>
<div class="wrapper">
    <header> DECISION TREE GENERATOR</header>
    <div class="content">
        <div class="main">

            <form action="indexx.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="radio" name="check" value="check1">
                    <label>Csv file: </label> <input type="file" name="filee"
                                                     id="filee">
                </div>
                <div class="form-group">
                    <input type="radio" name="check" value="check2">
                    <label>Sample files: </label> <select name="sample"
                                                          class="form-control">
                        <option name="baloon" id="baloon">baloon</option>
                        <option name="lenses" id="lenses">lenses</option>
                        <option name="sims" id="sims">sims</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Level of tree: </label> <select name="level"
                                                           class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Generate</button>
            </form>
            <br>
        </div>
        <div class="tree" id="displayTree">
            <?php
            if (isset($_POST['check'])) {
                if ($_POST['check'] == 'check1') {
                    if (isset ($_FILES ["filee"] ["tmp_name"])) {
                        move_uploaded_file($_FILES ["filee"] ["tmp_name"], "upload.csv");
                        require './decisionTree.php';
                        $user_level = $_POST ['level'];
                        decisionTree::create($user_level);
                    }
                } else {
                    if ($_POST['check'] == 'check2') {
                        $selected_sample = $_POST ['sample'];
                        switch ($selected_sample) {
                            case 'baloon':
                                copy('samples/baloon.csv', 'upload.csv');
                                require './decisionTree.php';
                                $user_level = $_POST ['level'];
                                decisionTree::create($user_level);
                                break;
                            case 'lenses':
                                copy('samples/lenses.csv', 'upload.csv');
                                require './decisionTree.php';
                                $user_level = $_POST ['level'];
                                decisionTree::create($user_level);
                                break;
                            case 'sims':
                                copy('samples/sims.csv', 'upload.csv');
                                require './decisionTree.php';
                                $user_level = $_POST ['level'];
                                decisionTree::create($user_level);
                                break;
                        }
                    }
                }
            }
            ?>
        </div>
    </div>

</div>
</body>
</html>