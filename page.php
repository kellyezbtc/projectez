<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
/* Style The Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
.txt
{
	color:#ffffff;
}
.txt1
{
	color:#f08757!important;
}
.button {
   /* background-color: #f08757; 
    border: none;
    color: white;
    padding: 5px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    cursor: pointer; */
	  cursor: pointer;
    display: inline-block;
    min-height: 1em;
    outline: 0;
    border: none;
    vertical-align: baseline;
    background: #E0E1E2;
    color: rgba(0,0,0,.6);
    font-family: Lato,'Helvetica Neue',Arial,Helvetica,sans-serif;
    margin: 0 .25em 0 0;
    padding: .78571429em 1.5em;
    text-transform: none;
    text-shadow: none;
    font-weight: 700;
    line-height: 1em;
    font-style: normal;
    text-align: center;
    text-decoration: none;
    border-radius: .28571429rem;
    box-shadow: 0 0 0 1px transparent inset, 0 0 0 0 rgba(34,36,38,.15) inset;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-transition: opacity .1s ease,background-color .1s ease,color .1s ease,box-shadow .1s ease,background .1s ease;
    transition: opacity .1s ease,background-color .1s ease,color .1s ease,box-shadow .1s ease,background .1s ease;
    will-change: '';
    -webkit-tap-highlight-color: transparent;
	 background: #f08757!important;
    color: #ffffff!important;
    font-weight: 400!important;
}
.ez-btn {
    background: #f08757!important;
    color: #ffffff!important;
    font-weight: 400!important;
}

.tt
{
	
    background: #FFF;
    margin: 1em 0;
    border: 1px solid rgba(34,36,38,.15);
    box-shadow: none;
    border-radius: .28571429rem;
 /*   text-align: left; */
    color: rgba(0,0,0,.87);
    border-collapse: separate;
    border-spacing: 0;
}
tr td
{ border-top:1px solid rgba(34,36,38,.1);
}
td
{    font-size: 13px;
    padding: 0.785714em;
}
body
{
	    font-family: Lato,'Helvetica Neue',Arial,Helvetica,sans-serif;
		font-size:13px;
}
.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 220px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    
    /* Position the tooltip */
    position: absolute;
    z-index: 1;
    top: -5px;
    left: 105%;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
</head>

<body>
<br />
<br />
<form id="form1" name="form1" method="post" action="">
<table width="780"  align="center" cellpadding="0" cellspacing="0" style="border: 1px solid rgba(34,36,38,.15); border-radius: .28571429rem; color: rgba(0,0,0,.87);" >
  <tr>
    <td align="center"><span class="txt1"><strong>Deposit (Fund) or Withdraw Currencies<br />
(Hover over Withdraw button for minimum and fee)</strong></span>
      <table width="750"  style="font-size:13px; border: 1px solid rgba(34,36,38,.15);border-radius: .28571429rem; color: rgba(0,0,0,.87);" class="tt"  >
      <tr>
        <td height="30" bgcolor="#000" class="txt"><strong>Currency</strong></td>
        <td height="30" bgcolor="#000" class="txt"><strong>Balance</strong></td>
        <td height="30" align="center" bgcolor="#000" class="txt"><strong>Fund</strong></td>
        <td height="30" align="center" bgcolor="#000" class="txt"><strong>Withdraw</strong></td>
      </tr>
      <tr>
        <td>Augur (REP) </td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><div class="tooltip"><button class="button button1">Withdraw </button><span class="tooltiptext">Minimum Withdrawal<br />

0.080000 REP
<br /><br />

Withdrawal Fee<br />

1.000000 REP</span></div></td>
      </tr>
      <tr>
        <td>BitShares (BTS) </td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><div class="tooltip"><button class="button button1">Withdraw</button><span class="tooltiptext">Minimum Withdrawal<br />

40.00000 BTS
<br /><br />

Withdrawal Fee<br />

8.00000 BTS</span></div></td>
      </tr>
      <tr>
        <td>Bitcoin (XBT) </td>
        <td>0.00000413</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><div class="tooltip"><button class="button button1">Withdraw</button><span class="tooltiptext">Minimum Withdrawal<br />

0.00400000 XBT<br />
<br />

Withdrawal Fee<br />

0.00195000 XBT</span></div></td>
      </tr>
      <tr>
        <td>Bitcoin Cash (BCH) </td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Bitcoin Gold (BTG)</td>
        <td>0.00003413</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Canadian Dollars (CAD)</td>
        <td>0.70</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Civic (CVC)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Dash (DASH)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Decred (DCR)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Ethereum (ETH)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Ethereum Classic (ETC)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Factom (FCT)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>GameCredits (GAME)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Golem (GNT)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Lisk (LSK)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Litecoin (LTC)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>MaidSafeCoin (MAID)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Monero (XMR)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>NAVCoin (NAV)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>NEM (XEM)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>NXT (NXT)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>OmiseGO (OMG)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Omni (OMNI)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Ripple (XRP)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Stellar Lumen (XLM) (STR)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Stratis (STRAT) </td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Syscoin (SYS)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Vertcoin (VTC)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Viacoin (VIA)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
      <tr>
        <td>Zcash (ZEC)</td>
        <td>0.00000000</td>
        <td align="center"><button class="button button1">Fund</button></td>
        <td align="center"><button class="button button1">Withdraw</button></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />
<br />
<br />


</form><br />
<br />
<br />

</body>
</html>