<?xml version="1.0" encoding="UTF-8"?>
<!-- StudentID: 101767225 -->
<!-- Student name: Duy Thuc Pham -->
<!-- his file uses to generate a report -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output omit-xml-declaration="yes" indent="yes"/>

  <xsl:strip-space elements="*"/>

  <xsl:template match="/">
    <table>
      <tr>
        <th>Customer ID</th>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Starting Price</th>
        <th>Reserve Price</th>
        <th>Buy It Now Price</th>
        <th>Bid Price</th>
        <th>Bidder ID</th>
        <th>Duration</th>
        <th>Status</th>
        <th>Created Date</th>
        <th>Created Time</th>
        <th>Revenue</th>
      </tr>

      <xsl:for-each select="items/item">
        <tr>
        <xsl:choose>
          <xsl:when test="status = 'sold'">
            <td><xsl:value-of select="customer_id"/></td>
            <td><xsl:value-of select="item_id"/></td>
            <td><xsl:value-of select="item_name"/></td>
            <td><xsl:value-of select="category"/></td>
            <td><xsl:value-of select="startingPrice"/></td>
            <td><xsl:value-of select="reservePrice"/></td>
            <td><xsl:value-of select="buyItNowPrice"/></td>
            <td><xsl:value-of select="bidPrice"/></td>
            <td><xsl:value-of select="bidderID"/></td>
            <td><xsl:value-of select="duration"/></td>
            <td><xsl:value-of select="status"/></td>
            <td><xsl:value-of select="currentDate"/></td>
            <td><xsl:value-of select="currentTime"/></td>
            <td><xsl:value-of select="bidPrice * 0.03"/></td>
          </xsl:when>
          <xsl:when test="status = 'failed'">
            <td><xsl:value-of select="customer_id"/></td>
            <td><xsl:value-of select="item_id"/></td>
            <td><xsl:value-of select="item_name"/></td>
            <td><xsl:value-of select="category"/></td>
            <td><xsl:value-of select="startingPrice"/></td>
            <td><xsl:value-of select="reservePrice"/></td>
            <td><xsl:value-of select="buyItNowPrice"/></td>
            <td><xsl:value-of select="bidPrice"/></td>
            <td><xsl:value-of select="bidderID"/></td>
            <td><xsl:value-of select="duration"/></td>
            <td><xsl:value-of select="status"/></td>
            <td><xsl:value-of select="currentDate"/></td>
            <td><xsl:value-of select="currentTime"/></td>
            <td><xsl:value-of select="reservePrice * 0.01"/></td>
            </xsl:when>
        </xsl:choose>
        </tr>
      </xsl:for-each>
    </table>
    <ul>
      <li><label>Total Number Sold: </label> <xsl:value-of select="count(items/item[status = 'sold'])"/></li>
      <li><label>Total Number Failed: </label> <xsl:value-of select="count(items/item[status = 'failed'])"/></li>
      <li><label>Total Sold Revenue: </label> <xsl:value-of select="sum(/items/item[status = 'sold']/bidPrice) * 0.03"/></li>
      <li><label>Total Failed Revenue: </label> <xsl:value-of select="sum(/items/item[status = 'failed']/reservePrice) * 0.01"/></li>
      <xsl:variable name="totalFailedRevenue" select="sum(/items/item[status = 'sold']/bidPrice) * 0.03"/>
      <xsl:variable name="totalSoldRevenue" select="sum(/items/item[status = 'failed']/reservePrice) * 0.01"/>
      <li><label>Total Revenue: </label> <xsl:value-of select="$totalFailedRevenue + $totalSoldRevenue"/></li>
    </ul>
  </xsl:template>
</xsl:stylesheet>
