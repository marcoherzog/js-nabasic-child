<div class="control-group"><div class="controls">

</div></div>

<div class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="companyName">Firmenname*</label>
    <div class="controls">
      [text companyName id:companyName class:input-xlarge]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="companyStreet">Adresse*</label>
    <div class="controls">
      [text* companyStreet id:companyStreet class:input-xlarge placeholder "Pappelallee 15"]
      [text* companyZipCode id:companyZipCode class:input-mini placeholder "10437"]&nbsp;[text* companyCity id:companyCity class:input-large placeholder "Berlin"]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="companyWebsite">Website</label>
    <div class="controls">
      [url companyWebsite id:companyWebsite class:input-xlarge]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="contactName">Ansprechpartner*</label>
    <div class="controls">
      [text* contactName id:contactName class:input-xlarge]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="contactDepartment">Abteilung</label>
    <div class="controls">
      [text contactDepartment id:contactDepartment class:input-xlarge]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="contactMailAddress">E-Mail*</label>
    <div class="controls">
      [email* contactMailAddress id:contactMailAddress class:input-xlarge]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="contactPhone">Telefon*</label>
    <div class="controls">
      [text* contactPhone id:contactPhone class:input-xlarge]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="contactFax">Fax</label>
    <div class="controls">
      [text contactFax id:contactFax class:input-xlarge]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="companyCV">Lebenslauf</label>
    <div class="controls">
      <p>Hier laden Sie den Firmenlebenslauf hoch. <br>Optimal im pdf-Dateiformat und nur mit farbigem Logo. <br>Maximal 2 Seiten! Bitte keinen farbigen Hintergrund.</p>
      [file companyCV id:companyCV]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="companyDescription">Beschreibungstext</label>
    <div class="controls">
      <p>Für die Darstellung auf der Website benötigen wir von Ihnen <br>einen Beschreibungstext (max. 2000Zeichen) und ein druckfähiges Logo (z.B. jpg, eps, ...)</p>
      [textarea companyDescription id:companyDescription /2000 placeholder "Ihr Firmenbeschreibungstext"]
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="companyLogo">Logo</label>
    <div class="controls">
      [file companyLogo id:companyLogo]
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      [captchac captcha-853 size:l]
[captchar captcha-853 class: class:input-mini] <span class="help-inline">Tragen Sie hier den Bestätigungs-Code aus dem Bild ein.</span>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      [submit class:btn class:btn-primary class:btn-large class:pull-right "Senden"]
    </div>
  </div>
</div>