<?xml version="1.0" encoding="utf-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="html" indent="yes" version="4.0" doctype-public="-//W3C//DTD HTML 4.01//EN" doctype-system="http://www.w3.org/TR/html4/strict.dtd" />

  <xsl:template match="/">
    <table id="shoppingcart">
      <xsl:call-template name="DisplayCart"></xsl:call-template>
    </table>
  </xsl:template>


  <xsl:template name="DisplayCart">


    <tr class="head">
      <td colspan="4" align="center">
        Shopping Basket
        <img src="sbasket.gif"></img>
      </td>
    </tr>

    <xsl:if test="number(//book/Quantity)>0">
      <tr>
        <td class="border">Item</td>

        <td class="border">Qty</td>
        <td class="border">Price</td>
        <td></td>
      </tr>
    </xsl:if>
    <xsl:for-each select="//book">
      <tr>
        <td class="border2" width="75px">
          <xsl:value-of select="Title" />
        </td>

        <td class="border2" align="center">
          <xsl:value-of select="Quantity" />
        </td>
        <td class="border2">
          $
          <xsl:value-of select="Price * Quantity" />
        </td>
        <td class="border2">
          <a href="javascript:AddRemoveItem('Remove');">
            <img src='button.jpg' />
          </a>
        </td>
      </tr>
    </xsl:for-each>
    <tr>
      <td colspan='4' class="border2"></td>

    </tr>
    <xsl:choose>
      <xsl:when test="sum(//book/Quantity)&gt;0">
        <tr>
          <td colspan="2" class="border2">Total:</td>

          <td class="border">
            $
            <xsl:value-of select="(//Total)" />
          </td>
          <td class="border2"></td>
        </tr>
      </xsl:when>
      <xsl:otherwise>
        <tr>
          <td colspan="4" class="border2">Your Basket Is Empty</td>
        </tr>
      </xsl:otherwise>
    </xsl:choose>
    <tr>
      <td colspan="4" class="border2"></td>

    </tr>
  </xsl:template>
</xsl:stylesheet>
