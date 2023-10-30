<div class="add-author-page">
    <a href="<?= BASEURL;?>/authorlist">
       <img class="back-arrow" src="<?= BASEURL;?>/img/back-arrow.svg" alt="back">
    </a>
    <div class="add-author-contents">
        <div class="add-author-header">
            <h1 id="add-author">Add Author</h1>
        </div>
        <form class="add-author-form" id="add-author-form">
            <div class="input-field">
                <label for="name">Name<span id="required-input">*</span></label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input-field-description">
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <button id="save-changes-author" class="save-changes-author" type="submit" name="save-changes-author">Save Changes</button>
        </form>
        <span id="required-input">*Required</span>
        <div id = 'flash-message'></div>
    </div>
</div>
<script src="<?= BASEURL; ?>/js/lib/flasher.js" defer></script>
<script src="<?= BASEURL; ?>/js/add_author.js" defer></script>