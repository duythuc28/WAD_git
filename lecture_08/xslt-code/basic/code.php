<?php
/*

    [1] XML
    [2] XSLT
    [3] Output

 */
?>


<?php // [1] XML
$xml = '
<?xml version="1.0" standalone="no" ?>
<hotels>
    <hotel>
        <city>Paris</city>
        <name>La Splendide</name>
        <type>Budget</type>
        <price>100</price>
    </hotel>
    <hotel>
        <city>London</city>
        <name>The Rilton</name>
        <type>Luxury</type>
        <price>300</price>
    </hotel>
    <hotel>
        <city>Paris</city>
        <name>Marriott Rive Gauche</name>
        <type>Luxury</type>
        <price>35
    </hotel>
    <hotel>
        <city>New York</city>
        <name>The Imperial</name>
        <type>Standard</type>
        <price>150</price>
    </hotel>
    <hotel>
        <city>Paris</city>
        <name>Passy Eiffel</name>
        <type>Standard</type>
        <price>240</price>
    </hotel>
</hotels>';
?>


<?php/* [2] XSLT
<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes" version="4.0" />
    <xsl:template match="/">
        <table border="1">
            <xsl:for-each select="//hotel[city='Paris']">
                <tr ><td><xsl:value-of select="name"/></td>
                    <xsl:choose>
                        <xsl:when test="type='Budget'">
                            <td style="background:red"><xsl:value-of select="price"/></td>
                        </xsl:when>
                        <xsl:when test="type='Luxury'">
                            <td style="background:lightblue"><xsl:value-of select="price"/></td>
                        </xsl:when>
                        <xsl:otherwise>
                            <td><xsl:value-of select="price"/></td>
                        </xsl:otherwise>
                    </xsl:choose></tr>
            </xsl:for-each>
        </table>
        <br />Total: <xsl:value-of select="count(//hotel[city='Paris'])"/>
        <br />Average Price: <xsl:value-of select="sum(//hotel[city='Paris']/price) div count(//hotel[city='Paris'])"/>
    </xsl:template>
</xsl:stylesheet>
*/?>


<!-- [3] Output -->
<table border="1">
    <tr>
        <td>La Splendide</td><td style="background:red">100</td>
    </tr>
    <tr>
        <td>Marriott Rive Gauche</td><td style="background:lightblue">350</td>
    </tr>
    <tr>
        <td>Passy Eiffel</td><td>240</td>
    </tr>
</table>
<br>Total: 3<br>Average Price: 230


