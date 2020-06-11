<?php
  
   require "db.php" ;

    if ( !isset($_GET["sort"])) {
        $sort = $_SESSION["sort"] ?? "created" ;
    }else {
        $sort = $_GET["sort"] ;
        $_SESSION["sort"] = $sort ; 
		} 

    $users = $db->query("select * from user order by name")->fetchAll(PDO::FETCH_ASSOC) ;
    $bookmarks = $db->query("select user.id uid, bookmark.id bid, name, title, note, created, url
                            from bookmark, user 
                          	where user.id = bookmark.owner and user.id = {$_SESSION["user"]["id"]}
                            order by $sort desc")->fetchAll(PDO::FETCH_ASSOC) ;

    $sharedBookmarks = $db->query("SELECT * FROM bookmark WHERE bookmark.id IN
                        (SELECT sharedbmId FROM sharedBookmark WHERE userId = {$_SESSION["user"]["id"]})")->fetchAll(PDO::FETCH_ASSOC);

    // CATEGORY QUERY
    $categories = $db->query("select * from category order by name asc")->fetchAll(PDO::FETCH_ASSOC);
    
?>



<!-- Floating button at the bottom right -->
<div class="fixed-action-btn">
  <a class="btn-floating btn-large brown darken-4 modal-trigger z-depth-2" href="#add_form">
    <i class="large material-icons">add</i>
  </a>
</div>
<!-- Floating button at the bottom right -->



<!-- Main Table for all bookmarks -->
<div id="mainTable">
    <table class="striped"  id="main-table">
     <tr style="height:60px" class="grey lighten-5">
         <th class="title">
             <a href="main?&pn=<?= $pageNo ?>&sort=title" style="color:black; font-size:x-large; font-weight: bolder;">Title 
             <?= $sort == "title" ? "<i class='material-icons'>arrow_drop_down</i>": "" ?>
             </a>
        </th>
         <th class="note">
             <a href="main?&pn=<?= $pageNo ?>&sort=note" style="color:black; font-size:x-large; font-weight: bolder;">Note 
             <?= $sort == "note" ? "<i class='material-icons'>arrow_drop_down</i>": "" ?>
             </a>
        </th>
         <th class="action" style="color:black; font-size:xx-large; font-weight: bolder;" >Actions</th>
     </tr>
     <?php require "search.php" ?> 
<!-- Main Table for all bookmarks -->



<!-- shared bookmarks  -->
<div id="shared-bookmarks" class="modal">
  <form action="addBmToCategory" method="post">
      <div class="modal-content">
        <table class="striped" id="shared-bookmarks">
          <thead>
          <tr>
            <th>Title</th>
            <th>Note</th>
            <th>Category</th>
            <th>Url</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach( $sharedBookmarks as $bm) : ?>
              <tr>
                <th><span class="truncate"><?=$bm["title"]?></span></th>
                <th><span class="truncate"><?=$bm["note"]?></span></th>
                <th><span class="truncate"><?=$bm["category"]?></span></th>
                <th><span class="truncate"><?=$bm["url"]?></span></th>
              </tr>
            <?php endforeach ?>
            <select class="browser-default" name="category">
              <option value="" disabled selected>Choose a category and click add button to add bookmark into a category</option>
              <?php foreach( $categories as $category) : ?>
              <option selected value="<?= $category['name']?>"><?= $category['name']?></option>
              <?php endforeach ?>
            </select>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
          <button  class="btn waves-effect waves-light adc" type="submit" name="action">Add
          <i class="material-icons right">send</i>
        </button>
      </div>
  </form>
</div>
<!-- shared bookmarks -->



<!-- All modal bookmarks in detail to show after clicking view buttons -->
  <div id="bm-detail" class="modal">
  <div class="modal-content">
    <table class="striped">
        <tr>
            <td>Title:</td>
            <td id="detail-title"></td>
        </tr>
        <tr>
            <td>Note:</td>
            <td id="detail-note"></td>
        </tr>
        <tr>
            <td>URL:</td>
            <td id="detail-url"></td>
        </tr>
        <tr>
            <td>Category:</td>
            <td id="detail-category"></td>
        </tr>
        <tr>
            <td>Date:</td>
            <td id="detail-date"></td>
        </tr>
    </table>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
  </div>
</div>
<!-- All modal bookmarks in detail to show after clicking view buttons -->



<!-- delete category -->
<div id="delete_category" class="modal">
  <form action="deleteCategory" method="get">
    <div class="modal-content">
      <h5 class="center">Delete a category</h5>
        <label class="active">Categories that you can delete. Select one.</label>
            <select class="browser-default" name="category">
            <option value="" disabled selected>Choose your option</option>
            <?php foreach( $categories as $category) : ?>
             <option selected value="<?= $category['name']?>"><?= $category['name']?></option>
            <?php endforeach ?>
            </select>
    </div>

    <div class="modal-footer">
        <button  class="btn waves-effect waves-light update-bm" type="submit" name="action">Delete
         <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
<!-- delete category -->



<!-- add category modal  new-->
<div id="add_category" class="modal">
  <form action="addCategory" method="post">
    <div class="modal-content">
      <h5 class="center">New Category</h5>
        <div class="input-field">
          <input id="category" type="text" name="category" >
          <label for="category">Category</label>
        </div>
    </div>
    <div class="modal-footer">
        <button  class="btn waves-effect waves-light update-bm" type="submit" name="action">Add
         <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
<!-- add category modal  new-->



<!-- Modal Form for new Bookmark -->
<div id="add_form" class="modal">
  <form action="addBM" method="post" >
    <div class="modal-content">
        <h5 class="center">New Bookmark</h5>
        <input type="hidden" name="owner" value="<?= $_SESSION["user"]["id"]?>">
        <div class="input-field">
          <input id="title" type="text" name="title" >
          <label for="title">Title</label>
        </div>
        <div class="input-field">
            <input id="url" type="text" name="url" >
            <label for="url">URL</label>
        </div>
        <div class="input-field">
          <textarea id="note" class="materialize-textarea" name="note"></textarea>
          <label for="note">Notes</label>
        </div>

        <!--new-->
        <div class="input-field form">  
            <label class="active">Category</label>
            <select class="browser-default" name="category">
            <option value="" disabled selected>Choose your option</option>
            <?php foreach( $categories as $category) : ?>
             <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
            <?php endforeach ?>
            </select>
        </div>
        <!--new-->
      </div>
      <div class="modal-footer">
        <button  class="btn waves-effect waves-light" type="submit" name="action">Add
         <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
<!-- Modal Form for new Bookmark -->



<!-- for editing the bookmark-->
 <?php  foreach($bookmarks as $bm) : ?>
   <div id="update_form<?=$bm['bid']?>" class="modal">
  <form action="editBM" method="post" id="update-form">
    <div class="modal-content">
        <h5 class="center">Bookmark Editing</h5>
        <input type="hidden" name="owner" value="<?= $_SESSION["user"]["id"]?>">
        <!-- updated part-->
      <input type="hidden" name="bid" value="<?=$bm['bid']?>">
        <!-- updated part-->
        
        <div class="input-field">
          <input id="title" type="text" name="title" value="<?=$bm['title']?>">
          <label for="title">Title</label>
        </div>
        <div class="input-field">
            <input id="url" type="text" name="url"  value="<?=$bm['url']?>">
            <label for="url">URL</label>
        </div>
        <div class="input-field">
          <textarea id="note" class="materialize-textarea" name="note"><?=$bm['note']?></textarea>
          <label for="note">Notes</label>
        </div>

        <div class="input-field form">  
            <label class="active">Category</label>
            <select class="browser-default" name="category">
            <option value="" disabled selected>Choose your option</option>
            <?php foreach( $categories as $category) : ?>
             <option  value="<?= $category['name']?>"><?= $category['name']?></option>
            <?php endforeach ?>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button  class="btn waves-effect waves-light update-bm" type="submit" name="action">Update
         <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>          
<?php endforeach ?> 
<!-- for editing the bookmark -->



<!-- users to share bookmarks -->
<?php  foreach($bookmarks as $bm) : ?>
<div id="shareBM<?=$bm['bid']?>" class="modal">
  <form action="shareBookmark" method="post">
  <input type="hidden" name="bid" value="<?=$bm['bid']?>">
      <div class="modal-content">
                   <h3 class="teal lighten-3 white-text center">Share the bookmark with other users</h3>
                      <div class="users">
                      <!-- checkboxes for users -->
                      <?php foreach ($users as $user) : ?>
                        <?php if($user["id"] != $_SESSION["user"]["id"]) : ?>
                          <label style="padding-left:10px;">
                            <input type="checkbox" name="users[]" value="<?=$user["id"]?>"/>
                            <span><?=$user["name"]?></span>
                          </label>
                        <?php endif  ?>
                      <?php endforeach ?>
                      <!-- checkboxes for users -->
                   </div>
        </div>
        <div class="modal-footer">
      <button class="btn waves-effect waves-light" type="submit">Share<i class="material-icons right"></i></button>
    </div>
        </form>
      </div>
      <?php endforeach ?> 
<!-- users to share bookmarks -->



<!-- searching -->
<div id="searching" class="modal">
  <form action="search&pn=<?= $pageNo ?>?$keyword=<?= $_SESSION["keyword"] ?>" method="POST">
    <div class="modal-content">
      <h4 class="center">Searching</h4>
      <div class="input-field">
            <input id="keyword" type="text" name="keyword">
            <label for="keyword">Enter keyword here!</label>
        </div>
    </div>
    <div class="modal-footer">
      <button class="btn waves-effect waves-light" type="submit">Search<i class="material-icons right">search</i></button>
    </div>
  </form>
</div>
<!-- searching -->



<!-- here is side bar CATEGORIES ARE HERE-->
<ul id="slide-out" class="sidenav sidenav-fixed">
        <li class="first grey darken-4 lighten-2 categories"><a style="color:white; font-size:x-large; font-weight: bolder;">All Bookmarks = <?=count($bookmarks)?></a></li>
      <?php foreach($categories as $category) : ?>
        <li id="cate<?=$category["name"]?> "class="first white lighten-2 categories" value="<?=$category['name']?>"><a style="color:teal; font-size:large; font-weight: bold";><?=$category["name"]?></a></li>
      <?php endforeach ?>
      <div class="editing">
        <a class="btn-floating  modal-trigger green darken-4" href="#add_category"><i class="material-icons">add</i></a>
        <a class="btn-floating modal-trigger red darken-4" href="#delete_category"><i class="material-icons">remove</i></a>
</ul> 
<!-- here is side bar CATEGORIES ARE HERE-->



<!--loaders-->
<div class="center hide" id="loader">
  <div class="preloader-wrapper small active">
      <div class="spinner-layer spinner-green-only">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
</div> 
<!--loaders-->



<!-- Initialization of modal elements and listboxes -->
  <script>

    var instanceDetail ;
    var sharedBookmarks;
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
        instanceDetail = M.Modal.init(document.getElementById("bm-detail")) ;
        sharedBookmarks = M.Modal.init(document.getElementById("shared-bookmarks"));
        elems = document.querySelectorAll('select');
        M.FormSelect.init(elems);
    });


    $(function(){
       $(".bms-delete").click(function(e){
          e.preventDefault() ;
         // alert("Delete Clicked") ;
         let id = $(this).attr("href") ;
         //alert( id + " clicked");
         $("#loader").toggleClass("hide") ; // show loader.
         $.get("delete",
               { "id" : id},
               function(data) {
                  console.log(data) ;
                  $("#row" + id).remove(); // removes from html table.
                  $("#loader").toggleClass("hide") ; // hide loader.
                  M.toast({html: 'Deleted', classes: 'rounded', displayLength: 1000});
               },
               "json" 
         );
       });


       $(".bms-notification").click(function(e){
         console.log("notification clicked");
         sharedBookmarks.open();
         $(".notification").css("visibility", "hidden");
         $.get("deleteSharedBookmarks",
            function(data){
               console.log(data + " burası datanın oldugu yer"); 
            },
            "json"
            )
        });


       $(".bms-view").click(function(e){
          e.preventDefault();
          let id = $(this).attr("href");
          
          console.log("bms view clicked id " + id) ;
          $("#loader").toggleClass("hide") ; // show loader.
          $.get("getBM",
                {"id" : id},
                function (data) {
                   console.log(data) ;
                   $("#detail-title").text(data.title) ;
                   $("#detail-url").text(data.url) ;
                   $("#detail-note").text(data.note) ;
                   $("#detail-date").text(data.created) ;
                   $("#detail-category").text(data.category);
                   instanceDetail.open() ;
                   $("#loader").toggleClass("hide") ; // hide loader.
                } 
                , "json"
          )
       });

       function getSharedBookmarks() {
         $.get("getSharedBookmarks",
         function(data){
          console.log(data);
          if(data > 0) {
            $("#notNumber").text(data + " new");
            $(".notification").css("visibility", "visible");
            console.log(data + " İFİN İÇİN");
            console.log(data.title);
           }
          else {
            $(".notification").css("visibility", "hidden");
          }
         },
         "json"
         );
       }


       getSharedBookmarks();
       setInterval(getSharedBookmarks, 5000);


        $(".adc").click(function(e){
          e.preventDefault();
          console.log("adc clicked");
          let data =  $(this).attr("href");
          console.log(data);
        })
 


  });
  </script>




  
