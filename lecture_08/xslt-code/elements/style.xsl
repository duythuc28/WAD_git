<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <!-- used to say something about the type of output produced -->
    <xsl:output method="html" indent="yes" version="4.0" />

    <!-- template this applied too -->
    <xsl:template match="/">

        <!-- select a single node based on a condition -->
        <xsl:value-of select="sum(//hotel[city='Paris']/price)"/>

        <!-- iterates a node path -->
        <xsl:for-each select="//hotel">
            <xsl:value-of select="price" />
        </xsl:for-each>

        <!-- optional logic based on condition -->
        <xsl:if test="//hotel[city='Paris']/price > 300">
        </xsl:if>

        <!-- optional logic based on if/else condition -->
        <xsl:choose>
            <xsl:when test="//hotel/price > 300">   <!-- if -->
            </xsl:when>
            <xsl:when test="//hotel/price > 600">   <!-- if -->
            </xsl:when>
            <xsl:otherwise>                         <!-- else -->
            </xsl:otherwise>
        </xsl:choose>

        <!-- sort a group of nodes by column and condition -->
        <xsl:for-each select="//hotel">
            <xsl:sort select="name" order="ascending"/> <!-- sort condition -->
            <xsl:value-of select="name"/>
        </xsl:for-each>

        <!-- variables -->
        <xsl:for-each select="//hotel">
            <xsl:variable name="name" select="name"/>
            <xsl:for-each select="phone">
                <xsl:value-of select="$name"/>
                <xsl:value-of select="."/>
            </xsl:for-each>
        </xsl:for-each>

    </xsl:template>
</xsl:stylesheet>
