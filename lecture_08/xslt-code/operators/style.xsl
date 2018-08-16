<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes" version="4.0" />
    <xsl:template match="/">

        <div>
            <xsl:value-of select="sum(//hotel[city='Paris']/price) > 300"/>
            <!-- does the sum of all hotels in paris prices greater than 300? true -->
        </div>

        <div>
            <xsl:value-of select="sum(//hotel[city='Paris']/price) = 300"/>
            <!-- does the sum of all hotels in paris prices equal 300? false -->
        </div>

        <div>
            <xsl:value-of select="sum(//hotel[city='Paris']/price) * count(//hotel[city='Paris'])"/>
            <!-- sum of prices of all hotels in paris multiplied by the total amount -->
        </div>

        <div>
            <xsl:value-of select="sum(//hotel[city='Paris']/price) div count(//hotel[city='Paris'])"/>
            <!-- sum of prices of all hotels in paris divided by the total amount -->
        </div>

        <div>
            <xsl:value-of select="contains(//hotel[city='Paris']/price, 0)"/>
            <!-- does the first city in paris price contain the number 0 -->
        </div>

        <div>
            <xsl:value-of select="string-length(//hotel[city='Paris']/price)"/>
            <!-- the first city in paris price has a string length of 3 -->
        </div>

        <!--

            [Operators]

                +  - * div mode
                = != > >=
                not true false and or


            [Function(s)]

                sum, div, count
                ceiling, floor, round


            [Function(s) String(s)]

                concat(string, string, ...)
                contains(string1, string2),
                substring(string, offset, range)
                starts-with(string1, string2)
                string-length(string)

        -->

    </xsl:template>
</xsl:stylesheet>
