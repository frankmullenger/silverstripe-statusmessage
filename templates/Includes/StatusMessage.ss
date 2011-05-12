<% require css(statusmessage/css/StatusMessage.css) %>

<% if StatusMessage %> 
<% control StatusMessage %> 
  <p class="message-box $Status"> 
    $Message 
  </p> 
<% end_control %> 
<% end_if %>