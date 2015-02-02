/**
 * Send AJAX Request
 * 
 * @param string $url
 * @param string $method
 * @param string $selector
 * @param string data (optional)
 * @return string
 */
function onloadAjax(url, method, selector, data)
{
  if(typeof(data)==='undefined') data = '';

  // start spinner object
  startHoldTight();
  $.ajax({
      url: url,
      type: method,
      data: data,
      success:function(response){
          //remove spinner object
          $(selector).html(response);          
          stopHoldTight();
      }
  });
}