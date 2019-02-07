<div class="my_meta_control">

    <label>To <span>(Enter comma separated Email IDs of recipients.)</span></label>

    <p>
        <input type="text" name="_my_meta[to]" value="<?= (!empty($meta['to'])) ? $meta['to'] : '';?>"/>
    </p>

    <label>Subject</label>

    <p>
             <input type="text" name="_my_meta[subject]" value="<?= (!empty($meta['subject'])) ? $meta['subject']: ''; ?>"/>
    </p>
    <label>Also want to send email at email addresses which are in the form ?</label>
      (Enter comma separated names of the email fields which you have used in Gravity Form or leave empty if you don't wish to send email at that email addresses.)
    <p>
             <input type="text" name="_my_meta[user_mail]" value="<?= (!empty($meta['user_mail'])) ? $meta['user_mail'] : '';?>"/>
    </p>
    <span>(Note: Email can only be sent at the email addresses of above names if there are email addresses in the Gravity Form and proper email field names are entered in the above field.)</span>
</div>