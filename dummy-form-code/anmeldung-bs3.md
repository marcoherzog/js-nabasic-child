<div class="form-horizontal" role="form">
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="companyName">Firmenname*</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      [text companyName id:companyName class:form-control]</div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="companyStreet">Adresse*</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      [text* companyStreet id:companyStreet class:form-control placeholder "Pappelallee 15"]
    </div>
    <div class="clearfix">
      <div class="col-sm-4 col-md-3 col-lg-2 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
        [text* companyZipCode id:companyZipCode class:form-control placeholder "10437"]
      </div>
      <div class="col-sm-5 col-md-4 col-lg-3">
        [text* companyCity id:companyCity class:form-control placeholder "Berlin"]
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="companyWebsite">Website</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      [url companyWebsite id:companyWebsite class:form-control]
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="contactName">Ansprechpartner*</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      [text* contactName id:contactName class:form-control]
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="contactDepartment">Abteilung</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      [text contactDepartment id:contactDepartment class:form-control]
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="contactMailAddress">E-Mail*</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      [email* contactMailAddress id:contactMailAddress class:form-control]
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="contactPhone">Telefon*</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      [text* contactPhone id:contactPhone class:form-control]
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="contactFax">Fax</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      [text contactFax id:contactFax class:form-control]
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="companyCV">Lebenslauf</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      <p>Hier laden Sie den Firmenlebenslauf hoch. <br>Optimal im pdf-Dateiformat und nur mit farbigem Logo. <br>Maximal 2 Seiten! Bitte keinen farbigen Hintergrund.</p>
      [file companyCV id:companyCV]
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="companyDescription">Beschreibungstext</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      <p>Für die Darstellung auf der Website benötigen wir von Ihnen <br>einen Beschreibungstext (max. 2000Zeichen) und ein druckfähiges Logo (z.B. jpg, eps, ...)</p>
      [textarea companyDescription id:companyDescription class:form-control /2000 placeholder "Ihr Firmenbeschreibungstext"]
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="companyLogo">Logo</label>
    <div class="col-sm-9 col-md-7 col-lg-5">
      [file companyLogo id:companyLogo]
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-9 col-md-7 col-lg-5 col-sm-offset-3 col-md-offset-3 col-lg-offset-3"">
      [captchac captcha-853 size:l]
[captchar captcha-853 class:form-control] <span class="help-inline">Tragen Sie hier den Bestätigungs-Code aus dem Bild ein.</span>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12 col-md-12 col-lg-12">
      [submit class:btn class:btn-primary class:btn-large class:pull-right "Senden"]
    </div>
  </div>
</div>
