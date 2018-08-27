<?xml version="1.0" encoding="UTF-8"?>
<!-- StudentID: 101767225 -->
<!-- Student name: Duy Thuc Pham -->
<!-- This file uses to load auction xml for creating category list -->
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output omit-xml-declaration="yes" indent="yes"/>

  <xsl:strip-space elements="*"/>

  <xsl:key name="kContract" match="item" use="category"/>

  <xsl:template match="items">
      <xsl:for-each select="item[
          generate-id() = generate-id(key('kContract', category)[1])
        ]">
        <xsl:variable name="categoryName" select="key('kContract', category)/category"/>
        <option value="{$categoryName}">
          <xsl:value-of select="key('kContract', category)/category"/>
        </option>
      </xsl:for-each>
      <option value="other">Other</option>
  </xsl:template>
</xsl:stylesheet>
