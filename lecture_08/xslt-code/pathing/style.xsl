<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes" version="4.0" />
    <xsl:template match="/">

        <div>
            <xsl:value-of select="//hotel[city='Paris']"/>
            <!-- select first city in paris -->
        </div>

        <div>
            <xsl:value-of select="/hotels/hotel[3]"/>
            <!-- select third in paris -->
        </div>

        <div>
            <xsl:value-of select="//hotel[@stars='3']"/>
            <!-- select first 3 start hotel -->
        </div>

        <div>
            <xsl:value-of select="//hotel[last()]"/>
            <!-- select last city -->
        </div>

        <div>
            <xsl:for-each select="//hotel">
                <xsl:if test="city='Paris' and type='Budget'">
                    <xsl:value-of select="city" />
                    <xsl:value-of select="type" />
                </xsl:if>
            </xsl:for-each>
            <!-- select city(s) that are in paris and of type budget -->
        </div>

    </xsl:template>
</xsl:stylesheet>
