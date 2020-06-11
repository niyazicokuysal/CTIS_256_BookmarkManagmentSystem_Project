<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
}elseif(isset($_GET["keyword"])){
    $keyword = $_GET["keyword"];
}else{
    $keyword = "";
}
    $_SESSION["keyword"] = $keyword;
    $re= "//i";
    $rep = substr_replace($re, $keyword, 1, 0);

    
    if (!isset($_GET["pn"]) || $_GET["pn"] == "" || $_GET["pn"] == 0 ){
        $pageNo = 1;
        $_SESSION["remainPage"] = $pageNo;
      }else{
        $pageNo = $_GET["pn"];
        $_SESSION["remainPage"] = $pageNo;
      }
    $size = count($bookmarks);
    $totalPage = (int)ceil($size / 10 ) ;
    $start = ($pageNo-1) * 10 ;
    $end = $start + 10 > $size ? $size : $start + 10 ; 

    $searchPages = [];
    if($_SESSION["keyword"] != ""){
        if (!isset($_GET["searches"]) || $_GET["searches"] == "" || $_GET["searches"] == 0){
            $searchPN = 1;
        }else{
            $searchPN = $_GET["searches"];
        }

        foreach($bookmarks as $sbm){
            if(preg_match($rep,$sbm['title']) || preg_match($rep,$sbm['note'])){
                array_push($searchPages, $sbm);
            }
        }
        $searchSize = count($searchPages);
        $searchPTotal = (int)ceil($searchSize / 10 ) ;
        $searchStart = ($searchPN-1) * 10 ;
        $searchEnd = $searchStart + 10 > $searchSize ? $searchSize : $searchStart + 10 ; 
    }
?>



<!--search part here-->
<?php if($_SESSION["keyword"] != "") :?>
    <?php for( $i=$searchStart; $i<$searchEnd; $i++) : $bm = $searchPages[$i] ;?> 
            <tr id="row<?= $bm["bid"] ?>">
            <td><span id="title" class="truncate"><a href="<?= $bm['url'] ?>" style="color:darkcyan; font-size:larger; font-weight: bold;"><?= $bm['title'] ?></a></span></td>
            <td><span id="note" class="truncate"><?= $bm['note'] ?></span></td>
            <td class="action">
              <a class="btn-small modal-trigger purple darken-3" href="#update_form<?=$bm['bid']?>"><i class="material-icons">create</i></a>
              <a href="<?= $bm["bid"] ?>" class="bms-delete btn-small purple darken-1"><i class="material-icons">delete</i></a>
              <a class="btn-small modal-trigger purple darken-3" href="#shareBM<?=$bm['bid']?>"><i class="material-icons">share</i></a>
              <a class="btn-small bms-view purple darken-2" href="<?= $bm['bid'] ?>"><i class="material-icons">visibility</i></a>
            </td>
            </tr>
    <?php endfor; ?>
    </table>
    </div>
    <!-- style="margin-top: 20px;" -->
    <?php if($searchSize != 0){
        echo "<div class='pgnsrc'>";
            echo "<ul class='pagination'>" ;
            if ($searchPN == 1) {
            echo '<li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>' ;
            } else {
            echo "<li><a href='search&searches=" . ($searchPN - 1) . "&keyword=$keyword&pn=$pageNo'><i class='material-icons'>chevron_left</i></a></li>" ;
            }
            
            for($i=1; $i<=$searchPTotal; $i++) {
            echo "<li " , 
                ($searchPN == $i ? "class='active light-blue darken-4'" : "" )
                , "><a href='search&searches=$i&keyword=$keyword&pn=$pageNo'>$i</a></li>" ;
            }
        
            if ( $searchPN == $searchPTotal) {
            echo '<li class="disabled"><a><i class="material-icons">chevron_right</i><a href=""></li>';
            } else {
            echo "<li><a href='search&searches=" . ($searchPN + 1) . "&keyword=$keyword&pn=$pageNo'><i class='material-icons'>chevron_right</i></a></li>";
            }
            echo "</ul>" ;
        }else{echo"<h5 style='padding-left: 330px; padding-bottom: 10px;'>You have no bookmark that include * ".$keyword." * in it.</h5>"; }?>
        <?php addMessage("Search Results Page $searchPN!"); displayMessage();?>
        <a class="waves-effect waves-light btn light-blue darken-4 back" href="main?&pn=<?= $_SESSION["remainPage"] ?>"><i class="material-icons left">keyboard_return</i>Back to all bookmarks!</a>
        </div>
<!--search part here-->



<!--Regular part here-->
<?php elseif($_SESSION["keyword"] == ""): ?>
    <?php for( $i=$start; $i<$end; $i++) : $bm = $bookmarks[$i] ; ?> 
            <tr id="row<?= $bm["bid"] ?>">
            <td><span id="title" class="truncate"><a href="<?= $bm['url']?>" style="color:darkcyan; font-size:larger; font-weight: bold;" ><?= $bm['title'] ?></a></span></td>
            <td><span id="note" class="truncate"><?= $bm['note'] ?></span></td>
            <td class="action">
                <a class="btn-small modal-trigger  purple darken-3" href="#update_form<?=$bm['bid']?>"><i class="material-icons">create</i></a>
                <a href="<?= $bm["bid"] ?>" class="bms-delete btn-small purple darken-1"><i class="material-icons">delete</i></a>
                <a class="btn-small modal-trigger purple darken-3" href="#shareBM<?=$bm['bid']?>"><i class="material-icons">share</i></a>
                <a class="btn-small bms-view  purple darken-2" href="<?= $bm['bid'] ?>"><i class="material-icons">visibility</i></a>
            </td>
            </tr>
    <?php endfor ?>
    </table>
    </div>
    <?php if($size != 0){
        echo "<div class='pgnmain'>";
            echo "<ul class='pagination'>" ;
            if ($pageNo == 1) {
            echo '<li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>' ;
            } else {
            echo "<li><a href='main?&pn=" . ($pageNo - 1) . "'><i class='material-icons'>chevron_left</i></a></li>" ;
            }
            
            for($i=1; $i<=$totalPage; $i++) {
            echo "<li " , 
                ($pageNo == $i ? "class='active light-blue darken-4'" : "" )
                , "><a href='main?&pn=$i'>$i</a></li>" ;
            }
        
            if ( $pageNo == $totalPage) {
            echo '<li class="disabled"><a><i class="material-icons">chevron_right</i><a href=""></li>';
            } else {
            echo '<li class="waves-effect"><a href="main?&pn=' . ($pageNo+1) . '"><i class="material-icons">chevron_right</i></a></li>';
            }
            echo "</ul>" ;
        echo "</div>";
        }else{echo"<h5 style='padding-left: 330px;'>You have no bookmark please click Add button to add bookmarks.</h5>"; }?>
<?php endif  ?>
<!--Regular part here-->
        
    
