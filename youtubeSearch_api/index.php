<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube channel playlists :)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
*{margin: 0; padding: 0; box-sizing: border-box;}
html body{width: 100%; height: 100%; background-color: darkgrey; color: snow;}
/* .container-fluid{width: 100%; height: 100%;} */
.selected{color: blue;}

</style>
<body>
    <div class="container" style="border-bottom: 2px solid blue; margin-bottom:5px;">
    <h2>Search & download Youtube videos :)</h2>    
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="form">
            <div class="row">
        
                <div class="form-group col-10">
                    <input type="text" class="form-control" id="search" name="search">
                </div>
                <div class="form-group col-2">
                    <input type="submit" value="Search" class="form-control" id="submit" name="submit">
                </div>
            </div>
        </form>
    </div>
    
    <?php
    error_reporting(E_ALL & ~E_NOTICE);
if(isset($_POST['submit'])){
    
$search= $_POST['search'];
$limit= 25;

$key= "Your API_KEY";
// $url= "https://www.googleapis.com/youtube/v3/playlists?part=snippet,contentDetails&channelId=".$channelId."&key=".$key;
$url= "https://www.googleapis.com/youtube/v3/search?part=snippet&q=".urlencode(str_replace(' ', '+', $search))."&type=video&maxResults=".$limit."&key=".$key;
$data= json_decode(file_get_contents($url));
// echo "<pre>";
// print_r($data);

//  exit();
?>

    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-xs-12 col-md-8 col-xmd-8 col-lg-8 d-flex" style="position: fixed;">
            <?php $fvideo= $data->items[0]->id->videoId; ?>
        <iframe id="player" width="640" height="320"
        src="https://www.youtube.com/embed/<?php echo $fvideo ?>"
        frameborder="0" allowfullscreen; allow="autoplay; accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen data-variable="<?php echo $fvideo ?>"></iframe>
        </div>
        <!-- https://localhost/watch?v=1SnPKhCdlsU -->
        <div class="col-xs-10 col-md-4 col-xmd-4 col-lg-4" style="position: absolute; top:140px; right:0;">
        <ul>
            
          <h4>Search Results:</h4>
          <?php
          foreach($data->items as $video){
          $channelTitle= $video->snippet->channelTitle;
          $title= $video->snippet->title;
          $desc= $video->snippet->description;
          $thumbnail= $video->snippet->thumbnails->high->url;
          $videoId= $video->id->videoId;
          $published= $video->snippet->publishedAt;
          

?>
<li>
<span class="col-12 content_div" id="vd-box" style="cursor: pointer;" data-variable="<?php echo $videoId ?>" onclick="currentVideo(this)";>
<div class="row d-flex inner-vid" id="vd-<?php echo $videoId ?>" id="target">
    <div class="col-4 img-thumbnail img-responsive d-flex" style="border: 1px solid blue; padding-left: 0; padding-right: 0; width: auto; height:150px; background-position:center; background-size:cover;">
        <img src="<?php echo $thumbnail; ?>" alt="_img-thumbnail" style="width: 100%; height:auto;">
    </div>
    <div class="col-8 d-flex" style="display: flex; flex-wrap: wrap; overflow:hidden;">
        <h6><?php echo $title; ?></h6>
        <h6><?php echo $channelTitle; ?></h6>
        <p><?php echo $desc; ?></p>
        <p><?php echo $published; ?></p>
        <a id= 'download' href= 'download.php?v=<?php echo urlencode($videoId); ?>'>DOWNLOAD</a>
    </div>
</div>
</span>
</li><?php } ?>

</ul>
</div>
</div>
</div>
<?php } ?>
</body>


<script type="text/javascript">
let player= document.getElementById('player');
let fname= player.getAttribute('data-variable');
// console.log(fname);

let fvideo= "vd-"+fname;
gotFVideo= document.getElementById(fvideo);
gotFVideo.classList.add('selected');
let pvideo= document.getElementsByClassName('selected');
// console.log(pvideo[0]);
let vdBox= document.getElementById('vd-box');

function currentVideo(self){
    pvideo[0].classList.remove("selected");
    // gotFVideo.classList.remove('selected');
    player.removeAttribute('data-variable');
    // console.log('clicked :'+self);
    let id= self.getAttribute('data-variable');
    // console.log(id);
    player.setAttribute('src', 'http://www.youtube.com/embed/'+id);
    player.setAttribute('data-variable', 'vd-'+id);
    cname= "vd-"+id;
    cvideo= document.getElementById(cname);
    cvideo.classList.add('selected');
    // console.log(cvideo);

        
}



</script>


    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
    
    </script>
</html>