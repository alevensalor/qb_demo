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
            <input type="text" placeholder="Sales Region" />
        </div>
        <div class="row">
            <label for="data-type">Type</label>
            <select id="selection-type">
                <option value="multi-select">Multi-select</option>
                <option value="single-select">Single-select</option>
            </select>
            <input type="checkbox" id="value-required"/>
            <label for="value-required">A Value is required</label>
        </div>
        <div class="row">
            <label for="default-value">Default Value</label>
            <input type="text" placeholder="Asia" />
        </div>
        <div class="row">
            <label for="choices">Choices</label>
            <select id="choices" size="5">
                <option value="Asia">Asia</option>
                <option value="Australia">Asia</option>
                <option value="Europe">Asia</option>
                <option value="America">Asia</option>
                <option value="Africa">Asia</option>
            </select>
        </div>
        <div class="row">
            <label for="sort-order">Order</label>
            <select id="sort-order" disabled="disabled">
                <option value="alpha-asc">Display choices in Alphabetical</option>
            </select>
        </div>
        <div class="row">
            <button id="save-changes">Save Changes</button> or
            <button id="cancel">Cancel</button>
        </div>
    </fieldset>

   <img src="doc/php-craft-demo-form.png" width="700px" height="800px" />

 </body>
</html>
