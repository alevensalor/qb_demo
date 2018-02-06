<html>
 <head>
  <title>PHP Craft Demo</title>
  <link rel="stylesheet" media="all" href="css/style.css" />
 </head>
 <body>
   <br />
   <h1>PHP Craft Demo</h1>
    <fieldset>
        <legend>Field Builder</legend>
        <div class="row">
            <label for="data-label">Label</label>
            <input type="text" id="data-label" placeholder="Sales Region" />
            <span class='error-display' id='data-label-error'></span>
        </div>
        <div class="row">
            <label for="data-type">Type</label>
            <select id="selection-type">
                <option value="multi-select">Multi-select</option>
                <option value="single-select">Single-select</option>
            </select>
            <input type="checkbox" id="value-required" checked="checked"/>
            <label for="value-required">A Value is required</label>
        </div>
        <div class="row">
            <label for="default-value">Default Value</label>
            <input type="text" id="default-value" placeholder="Asia" />
            <span class='error-display' id='default-value-error'></span>
        </div>
        <div class="row">
            <label for="choice-to-add">New Choice</label>
            <input type="text" id="choice-to-add" placeholder="new choice"/>
            <button id="add-choice">+</button>
        </div>
        <div class="row">
            <label for="choices">Choices</label>
            <select id="choices" size="5">
                <option value="Asia">Asia</option>
                <option value="Australia">Australia</option>
                <option value="Europe">Europe</option>
                <option value="America">America</option>
                <option value="Africa">Africa</option>
            </select>
        </div>
        <div class="row">
            <label for="sort-order">Order</label>
            <select id="sort-order" disabled="disabled">
                <option value="alpha-asc">Display choices in Alphabetical</option>
            </select>
        </div>
        <div class="row buttons">
            <button id="save-changes">Save Changes</button> or
            <button id="cancel">Cancel</button>
        </div>
        <div class="row">
            <input type='checkbox' id="client-validate" checked="checked"/>
            <label for="client-validate">Client-Side Validation</label>
        </div>
    </fieldset>

   <img src="doc/php-craft-demo-form.png" width="700px" height="800px" />

    <script src="js/jquery.min.js"></script>
    <script src="js/qb_demo.js"></script>
 </body>
</html>
