<?php /** @var array $asideCreatifs 
        * @var array $asideTags 
        * @var array $project */ ?>

<div class="col-lg-4">
          <!-- Widget Créa'tif -->
          <div class="ct-side-card">
            <h5 class="ct-side-card__head"><?php echo $project ? "Le créa'tif" : "Les créa'tifs"; ?></h5>
            <div class="ct-side-card__body">
              <?php if ($project): ?>
                <div class="ct-profile">
                  <img src="images/<?php echo $project['creatif_image']; ?>" alt="<?php echo $project['pseudo']; ?>" />
                  <div>
                    <strong><a href="#"><?php echo $project['pseudo']; ?></a></strong>
                    <p><?php echo $project['bio']; ?></p>
                  </div>
                </div>
              <?php else: ?>
              <ul class="ct-creatif-list">
                <?php foreach ($asideCreatifs as $creatif):?>
                  <li>
                  <img class="ct-avatar" src="images/<?php echo $creatif['image'];?>" alt="<?php echo $creatif['pseudo'];?>" />
                  <a href="#"><?php echo $creatif['pseudo'];?></a>
                  <span class="ct-count">4</span>
                  </li>
                <?php endforeach;?>
              </ul>
              <?php endif; ?>
            </div>
          </div>

          <!-- Widget Tags -->
          <div class="ct-side-card">
            <h5 class="ct-side-card__head">Tags</h5>
            <div class="ct-side-card__body">
              <ul class="ct-tags">
              <?php foreach ($asideTags as $tag):?>
                <li><a class="ct-tag" href="#"><?php echo $tag['nom'];?></a></li>
                <?php endforeach;?>
              </ul>
            </div>
          </div>
        </div>