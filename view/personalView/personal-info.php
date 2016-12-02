<div class="personal-info content">
    <img class="info-face-img" src="<?php echo $view->getFace()?>" alt="<?php echo $view->getName()?>" width="100px" height="100px">
    <div class="personal-info-right">
        <div class="personal-introduction">
            <div class="title">
                <h2><?php echo $view->getName() ?></h2>
                <div class="level">
                    <?php echo $view->getLevel() ?>
                </div>
            </div>
            <div class="experience">
                <div class="experience-title">经验值：</div>
                <div class="experience-bar">
                    <div class="experience-bar-filled" style="width: <?php echo $view->getWidth()?>">

                    </div>
                </div>
                <div class="experience-num">
                    <?php echo $view->getExperience() ?>
                </div>
            </div>
            <div class="personal-info-other">
                <p><?php echo $view->getDescription() ?></p>
                <span class="personal-info-span">
                            <span class="not-last-span"><?php echo $view->getGender() ?></span>
                            <span class="not-last-span"><?php echo $view->getLocation() ?></span>
                            <span><?php echo $view->getBirthday() ?></span>
                        </span>
                <a style="<?php if ($view->isSelf()) echo "visibility: visible"; else echo "display: none"; ?>" class="edit-btn" href="/personal.php/edit/<?php echo $view->getId()?>">编辑</a>
                <a style="<?php if (!$view->isSelf()) echo "visibility: visible"; else echo "display: none"; ?>"class="custom-btn plane-colored-btn user-info-btn
                        <?php
                if ($view->getIsFriend() == "2"){
                    echo "btn-disabled";
                } else {
                    if ($view->getFocused() == "1"){
                        echo " un-focus";
                    } else {
                        echo " focus";
                    }
                }
                ?>">
                    <?php
                    if ($view->getFocused() == "1"){
                        echo "取消关注";
                    } else {
                        echo "关注";
                    }
                    ?>
                </a>
                <a style="<?php if (!$view->isSelf()) echo "visibility: visible"; else echo "display: none"; ?>"class="custom-btn plane-colored-btn user-info-btn
                           <?php
                if ($view->getIsFriend() == "2"){
                    echo "delete-friend";
                } else if ($view->getIsFriend() == "1"){
                    echo "btn-disabled";
                } else {
                    echo "apply-friend";
                }
                ?>">
                    <?php
                    if ($view->getIsFriend() == "2"){
                        echo "删除好友";
                    } else {
                        echo "加为好友";
                    }
                    ?>
                </a>
            </div>
        </div>
    </div>