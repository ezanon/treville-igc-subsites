<!DOCTYPE html>
<?php
$uri = get_stylesheet_directory_uri();
?>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Linha Histórica :: <?php echo bloginfo(); ?></title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800'>

    <link rel="stylesheet" href="<?php echo $uri; ?>/historico-template/ps-group-timeline-2/css/style.css">
    <link rel="stylesheet" href="<?php echo $uri; ?>/historico-template/ps-group-timeline-2/css/styleigc.css">

  
</head>

<body>   

<?php
// historico *start*                  
$posts = get_posts(array(
   'post_type' => 'historico', 
   'posts_per_page' => -1,
   'meta_key' => 'data',
   'orderby' => 'meta_value',
   'order' => 'ASC'
));

// arrays para gerar timeline no final do loop nos posts
$timelineNav = array();
$timelineWrapper = array();
$i =0;

if ($posts){

    foreach($posts as $post){
        $k = 0; // se maior que 0 mostrará link para mais informações
        $i++;
        setup_postdata($post);

        $fields = get_fields();
        if ($fields):
            foreach ($fields as $name => $value):
                $$name = $value;
            endforeach;
        endif;
        
        $titulo = get_the_title();
        $link = get_the_permalink();

        // data
        // reformata data
        $dataA = explode("/", $data);        
        $dataF = ''; // por ex 2018, Ago 27
        $dataB = ''; // por ex 27/08/1978
        foreach ($dataA as $j=>$d){
            if ($j==0){ //ano
                $Y = $d;
                $dataF.= $d;
                $dataB = $d;
            }
            elseif ($j==1){ // mes
                $dataF.= ", ";
                $dataB = $d . '/' . $dataB;
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
            elseif ($j==2) { // dia
                $dataF.= " " . $d;
                $dataB = $d . '/' . $dataB;
            }
        }

        $timelineNav[$i] = $dataB; //the_field('data');

        // titulo
        //echo the_field('titulo') . "<br>";

        //resumo
        if ($resumo)
            //echo the_field('resumo') . "<br>";
            $resumo = "<p class='resumo timeline-text'>{$resumo}</p>\n";
        
        // link
        $link = "<p class='link timeline-text'><a href='$link'>Mais informações</a></p>\n";

        //texto
        //echo $texto . "<br>";
        if ($texto) $k++;

        // imagem
        $imagem = get_field('imagem');
        //echo "<img src='{$imagem['url']}' width=800 /> <br>";

        // arquivo pdf
        $pdf = get_field('arquivo');
        if ($pdf) $k++;
        
        // verifica se mostrará link para mais informações
        if ($k==0) $link = '';
        
        $timelineWrapper[$i] = "                
                <div class='timeline-slide' style='background-image: url({$imagem['url']});' data-year='{$dataB}'>
                <span class='timeline-year'>{$dataF}</span>
                <div class='timeline-slide__content'>
                        <h4 class='titulo timeline-title'>{$titulo}</h4>
                        {$resumo}
                        $link
                </div></div>\n";
                        
        // limpa variaveis
        $titulo = '';
        $data = '';
        $resumo = '';
        $texto = '';
        $pdfLink = '';
        $link = '';
    }
}
else {
    ?>
    <div class="container">
    <h1 class="title">Não há histórico cadastrado.</h1>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js'></script>
    <script  src="<?php echo $uri; ?>/historico-template/ps-group-timeline-2/js/index.js"></script>
    </body>
    </html>    
    <?php
    die();
}
wp_reset_postdata();
?> 
    
<?php
// monta html
?>

<div class="container">
  <h1 class="title">Linha Histórica :: <?php echo bloginfo(); ?></h1> 
  <div class="timeline">
    <div class="timeline-nav">  
    
        <?php    
        foreach ($timelineNav as $t){
            echo '<div class="timeline-nav__item">' . $t . '</div>' . "\n";
        }
        ?>

    </div>
      <div class="timeline-wrapper">
          <div class="timeline-slider">
              
              <?php
              foreach ($timelineWrapper as $t){
                  echo $t;
              }
              ?>
              
          </div>
      </div>
     
  </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js'></script>

<script  src="<?php echo $uri; ?>/historico-template/ps-group-timeline-2/js/index.js"></script>

</body>

</html>    