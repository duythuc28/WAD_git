<?xml version="1.0" encoding="UTF-8"?>
<!-- StudentID: 101767225 -->
<!-- Student name: Duy Thuc Pham -->
<!-- This file uses to load xml and create a Bidding page -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output omit-xml-declaration="yes" indent="yes"/>

  <xsl:strip-space elements="*"/>

  <xsl:template match="/">

      <xsl:for-each select="items/item">

        <div class="result">
          <label id="item_number">Item No:</label>
          <label id="item_number_data"><xsl:value-of select="item_id"/>
          </label>
          <xsl:variable name="itemNumber" select="item_id"/>
          <br/>
          <br/>
          <label id="item_name">Item Name:</label>
          <label id="item_name_data"><xsl:value-of select="item_name"/>
          </label>
          <br/>
          <br/>
          <label id="category">Category:</label>
          <label id="category_data">
            <xsl:value-of select="category"/>
          </label>
          <br/>
          <br/>
          <label id="description">Description:</label>
          <label id="description_data">
            <xsl:value-of select="description"/>
          </label>
          <br/>
          <br/>
          <label id="buy_it_now_price">Buy It Now Price:</label>
          <label id="buy_it_now_price_data">
            <xsl:value-of select="buyItNowPrice"/>
          </label>
          <br/>
          <br/>
          <label id="bid_price">Bid Price:</label>
          <label id="bid_price_data">
            <xsl:value-of select="bidPrice"/>
          </label>
            <xsl:variable name="bidPrice" select="bidPrice"/>
          <br/>
          <br/>
          <label id="status">Status:</label>
          <label id="status_data" style="text-transform:uppercase">
            <xsl:value-of select="status"/>
          </label>
          <br/>
          <br/>
          <xsl:if test="status = 'in process'">
          <label class="timeLeft" id="time_left_data">
            <xsl:value-of select="duration"/>
          </label>
          <br/>
          <br/>
          <div class="button_holder">
            <button id="{$itemNumber}" class="placeBidButton" type="button" name="{$bidPrice}">Place Bid</button>
            <button id="{$itemNumber}" class="buyItNowButton"  type="button" name="buyItNowButton" >Buy It Now</button>
          </div>
          </xsl:if>
        </div>
      </xsl:for-each>

  </xsl:template>
</xsl:stylesheet>
