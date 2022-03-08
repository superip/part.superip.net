<script type="text/javascript">
    function display_submenu(num) { 
         document.getElementById("mysub"+num).style.display="block";
    }
</script>

<div id="mysubmenu">
      <?php
    $sql = " select *
                from {$g5['menu_table']}
                where me_use = '1'
                  and length(me_code) = '2'
                order by me_order, me_id ";
    $result = sql_query($sql, false);
    $gnb_zindex = 999; // gnb_1dli z-index 값 설정용

    for ($i=0; $row=sql_fetch_array($result); $i++) {
    ?>
    <ul id="mysub<?php echo $i ?>" style="display:none;" class="tab_submenu">
        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" ><li class="leftmenu_b"><?php echo $row['me_name'] ?></li></a>
            <?php
            $sql2 = " select *
                        from {$g5['menu_table']}
                        where me_use = '1'
                          and length(me_code) = '4'
                          and substring(me_code, 1, 2) = '{$row['me_code']}'
                        order by me_order, me_id ";
            $result2 = sql_query($sql2);
            
            //좌측 서브메뉴 전체 리스트에서 현재 페이지에 해당하는 대메뉴 리스트만 보여줌
            if ( ($row['me_name']==$board['bo_subject'])||($row['me_name']==$g5['title'])){
                echo ("<script language='javascript'> display_submenu(" .$i. " ); </script> ");
            }
    
            for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                if($k == 0)
                    echo '<ul class="tab_sub2ul">'.PHP_EOL;
            ?>
                <li<?php if(($row2['me_name']==$board['bo_subject'])||($row2['me_name']==$g5['title'])) { echo " class=\"on\""; } ?>><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="leftmenuwrap hover3"><?php echo $row2['me_name'] ?></a></li>
                
            <?php  
                //좌측 서브메뉴 전체 리스트에서 현재 페이지에 해당하는 대메뉴 리스트만 보여줌
                if ( ($row2['me_name']==$board['bo_subject'])||($row2['me_name']==$g5['title']) ) {
                    echo ("<script language='javascript'> display_submenu(" .$i. " ); </script> ");
                }
            }
            if($k > 0)
                echo '</ul>'.PHP_EOL;
            ?>
    </ul>
    <?php } ?>
</div>



