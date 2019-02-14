<!doctype html>
<?php
$uri = get_stylesheet_directory_uri();
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <link href="<?php echo $uri; ?>/css/style-single-historico.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Linha Histórica :: <?php echo bloginfo(); ?></title>
  </head>
  <body>

<div id='containerHistoria' class="container border rounded">         
      
<?php

$post = get_post();
      
setup_postdata($post);

$fields = get_fields();
if ($fields):
    foreach ($fields as $name => $value):
        $$name = $value;
    endforeach;
endif;

$titulo = get_the_title(); 

// imagem
$imagem = get_field('imagem');

// reformata data
$data = explode("/", $data);
$dataF = '';
foreach ($data as $i=>$d){
    if ($i==0){ //ano
        $dataF.= $d;
    }
    elseif ($i==1){ // mes
        $dataF.= ", ";
        switch ($d){
            case 1: $dataF.= 'Jan'; break;
            case 2: $dataF.= 'Fev'; break;
            case 3: $dataF.= 'Mar'; break;
            case 4: $dataF.= 'Abr'; break;
            case 5: $dataF.= 'Mai'; break;
            case 6: $dataF.= 'Jun'; break;
            case 7: $dataF.= 'Jul'; break;
            case 8: $dataF.= 'Ago'; break;
            case 9: $dataF.= 'Set'; break;
            case 10: $dataF.= 'Out'; break;
            case 11: $dataF.= 'Nov'; break;
            case 12: $dataF.= 'Dez'; break;
            break;
        }
    }
    elseif ($i==2) {
        $dataF.= " " . $d;
    }
}
$data = $dataF;

?>

    <h1 class="display-5"><?php echo bloginfo(); ?></h1>
    
      
          <h1>
              <a href="javascript:history.back()"><i class="material-icons">arrow_back</i></a>
              <span class="badge badge-secondary"><?php echo $data; ?></span>
              <?php echo $titulo; ?>
              
          </h1>
          <h3><?php echo $resumo; ?></h3>
          <img src='<?php echo $imagem['url']; ?>' class="img-fluid rounded mx-auto d-block" />
          <p class="lead"><?php echo $texto; ?></p>
          
          <?php
            // arquivo pdf
            $pdf = get_field('arquivo');
            if ($pdf) {
                $url = $pdf['url'];
                $title = $pdf['title'];
                $pdf = "<p class=\"lead\"><a href=\"$url\" target=_blank>$title</a></p>";
                $pdf = "<a href=\"$url\" target=_blank><button type=\"button\" class=\"btn btn-secondary\">{$title}</button></a>\n";
            }
            else $pdf = '';
            echo $pdf;
          ?>    
          
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
  </body>
</html>