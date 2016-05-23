<?php

// The form input portion of our styleguide template

?>

<section class="sg-section">
  <h2 class="sg-section-header">Form Inputs</h2>

  <form action="#">

    <fieldset>
      <legend>Text Input</legend><label for="sg-text">Text Input <abbr title="Required">*</abbr></label>
      <input id="sg-text" type="text" placeholder="Text Input">
      <label for="sg-password">Password</label>
      <input id="sg-password" type="password" placeholder="Type your Password">
      <label for="sg-webaddress">Web Address</label>
      <input id="sg-webaddress" type="url" placeholder="http://yoursite.com">
      <label for="sg-emailaddress">Email Address</label>
      <input id="sg-emailaddress" type="email" placeholder="name@email.com">
      <label for="sg-search">Search</label>
      <input id="sg-search" type="search" placeholder="Enter Search Term">
      <label for="sg-textarea">Textarea</label>
      <textarea id="sg-textarea" rows="8" cols="48" placeholder="Enter your message here"></textarea>
    </fieldset>

    <fieldset>
      <legend>Number Input</legend>
      <label for="sg-in">Number input</label>
      <input type="number" id="sg-in" min="0" max="10" value="5">
      <label for="sg-ir">Range input</label>
      <input type="range" id="sg-ir" value="10">
    </fieldset>

    <fieldset>
      <legend>Date Fields</legend>
      <label for="sg-idd">Date input</label>
      <input type="date" id="sg-idd" value="1970-01-01">
      <label for="sg-idm">Month input</label>
      <input type="month" id="sg-idm" value="1970-01">
      <label for="sg-idw">Week input</label>
      <input type="week" id="sg-idw" value="1970-W01">
      <label for="sg-idt">Datetime input</label>
      <input type="datetime" id="sg-idt" value="1970-01-01T00:00:00Z">
      <label for="sg-idtl">Datetime-local input</label>
      <input type="datetime-local" id="sg-idtl" value="1970-01-01T00:00">
    </fieldset>

    <fieldset>
      <legend>Pre-populated fields</legend>

      <label for="sg-select">Select</label>
      <select id="sg-select">
        <optgroup label="Option Group 1">
          <option>Option One</option>
          <option>Option Two</option>
          <option>Option Three</option>
        </optgroup>
        <optgroup label="Option Group 2">
          <option>Option Four</option>
          <option>Option Five</option>
          <option>Option Six</option>
        </optgroup>
      </select>
      <ul class="input-list">
        <li>
          <input id="sg-checkbox1" name="checkbox" type="checkbox" checked="checked">
          <label for="sg-checkbox1">Choice A</label>
        </li>
        <li>
          <input id="sg-checkbox2" name="checkbox" type="checkbox"> 
          <label for="sg-checkbox2">Choice B</label>
        </li>
        <li>
          <input id="sg-checkbox3" name="checkbox" type="checkbox">
          <label for="sg-checkbox3">Choice C</label>
        </li>
      </ul>

      <ol class="input-list">
        <li>
          <input id="sg-radio1" name="radio" type="radio" class="radio" checked="checked">
          <label for="sg-radio1">Option 1</label>
        </li>
        <li>
          <input id="sg-radio2" name="radio" type="radio" class="radio">
          <label for="sg-radio2">Option 2</label>
        </li>
        <li>
          <input id="sg-radio3" name="radio" type="radio" class="radio">
          <label for="sg-radio3">Option 3</label>
        </li>
      </ol>
    </fieldset>

    <fieldset>
      <legend>Colour selection</legend>
      <label for="sg-ic">Color input</label>
      <input type="color" id="sg-ic" value="#ff9900">
    </fieldset>

  </form>
</section>
