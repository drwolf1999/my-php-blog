<?php if (isset($categories)) { ?>
    <div class="select is-fullwidth">
        <select id="category" name="category">
            <?php foreach ($categories as $category) {?>
                <?php if (isset($selectedCategory) && $selectedCategory == $category['id']) { ?>
                    <option value="<?= $category['id'] ?>" selected><?= $category['name'] ?></option>
                <?php } else { ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
    </div>
<?php } ?>