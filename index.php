<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" media="all" href="/css/calendar-win2k-cold-1.css" title="win2k-cold-1" />
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <script type="text/javascript" src="/javascripts/calendar.js"></script>
    <script type="text/javascript" src="lang/calendar-en.js"></script>
    <script type="text/javascript" src="/javascripts/calendar-setup.js"></script>
    </head>
    <body>
      <table align="left" border="0" cellspacing="0" cellpadding="5">
        <tr><td>
          <form target=GMap name="GMaps" id="GMaps" action="read.php" method="get">
            <H3>GPS Tracking Service</H3>
            <table width="400" align="left" border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td width="100">Name</td><td><INPUT TYPE="text" NAME="id" SIZE="9" MAXLENGTH="8"></td>
              </tr>
              <tr>
               <td width="100">Password</td><td><INPUT TYPE="password" NAME="pwd" SIZE="9" MAXLENGTH="8"></td>
              </tr>
              <tr>
                <td width="100">From</td><td><INPUT TYPE="text" NAME="from" SIZE="19" MAXLENGTH="19">
                <button type="reset" id="trigger_from">...</button></td>
              </tr>
              <tr>
                <td width="100">To</td><td><INPUT TYPE="text" NAME="to" SIZE="19" MAXLENGTH="19">
                <button type="reset" id="trigger_to">...</button></td></td>
            </tr>
            <tr>
              <td><input type="submit" name="action" value="ShowTrack"></td>
            </tr>
          </table>
        </form>
      </td></tr>
      <tr><td>
        <iframe id=GMap name=GMap width="720" height="520" scrolling="no" noresize="noresize" frameborder="1"></iframe>
      </td></tr>
    </table>
    <script type="text/javascript">
    Calendar.setup({
        inputField     :    "from",      // id of the input field
        ifFormat       :    "%Y-%m-%d %H:%M:%S",       // format of the input field
        showsTime      :    true,            // will display a time selector
        button         :    "trigger_from",   // trigger for the calendar (button ID)
        singleClick    :    true,           // double-click mode
        timeFormat     :    "24",
        firstDay       :    1
    });
    Calendar.setup({
        inputField     :    "to",      // id of the input field
        ifFormat       :    "%Y-%m-%d %H:%M:%S",       // format of the input field
        showsTime      :    true,            // will display a time selector
        button         :    "trigger_to",   // trigger for the calendar (button ID)
        singleClick    :    true,           // double-click mode
        timeFormat     :    "24",
        firstDay       :    1
    });
    </script>
  </body>
</html>