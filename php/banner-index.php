 <?php 
 session_start();

  
    include('admin/cargador.php');
    
    $objDb  = new connectionDb();
    $objLog = new Login();
    $objGal = new Gallery();
    //we connected
    $objDb->create_Connection();

  $mysql=mysql_query("SELECT DISTINCT p.id as id ,p.introduction as introduction,p.title as title ,p.modified as modified,pg.photo as photo,pg.desc_es  as desc_es from posts as p inner join  posts_gallery as pg on p.id=pg.post_id group by p.id  order by modified DESC LIMIT 1");

  $banner=mysql_fetch_array($mysql);

  $postId=$banner['id'];

  echo '<a href="post.php?id='.$postId.'"><img src="images/gallery-post/'.$banner['photo'].'"  alt="'.$banner['desc_es'].'"class="imghome"></a>';

  ?>

    



    <div class="banner_index_content">



					<h1><?php echo '<a href="post.php?id='.$postId.'">"'.$banner['title'].'"</a>'; ?></h1>



					<p><?php echo $banner['introduction']; ?></p>

           <?php        

       

            echo '<a href="post.php?id='.$postId.'"><span class="viewmore center-block">MORE <img src="images/view.png" align="middle" height="15" width="10"></span></a>';         



          ?>





				</div>