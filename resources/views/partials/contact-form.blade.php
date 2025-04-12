<div class="additional-header">
  <h3>
    Fill out this form
  </h3>
</div>

<p class="lead">
  Our support staff will get in touch with you as soon as possible. <br> Holidays & weekends may take extra time.
</p>

<form id="contact-us-form" action="/contact" method="POST">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-5">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
      </div>

      <div class="form-group">
        <label for="email">Email <sup>*</sup></label>
        <input type="email" name="email" id="email" class="form-control">
      </div>

      <div class="form-group">
        <label for="subject">Subject <sup>*</sup></label>
        <input type="text" name="subject" id="subject" class="form-control">
      </div>
    </div>

    <div class="col-md-7">
      <div class="form-group">
        <label for="body">Message <sup>*</sup></label>
        <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>

      </div>
    </div>
  </div>


  <div class="actions">
    <input type="submit" class="btn btn-primary btn-lg" value="Send Message">
  </div>
</form>