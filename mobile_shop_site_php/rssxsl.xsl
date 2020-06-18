<?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet type="text/css" href="d.css"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<html>
			<body bgColor="#000;">
				<table border="1" style="padding:2px 5px 2px 5px;">
					<tr style="background:#fa0e56;color:white;">
						<th>Title</th>
						<th>Link</th>
						<th>Description</th>
					</tr>
					<xsl:for-each select="rss/channel/item">
						<tr style="color:white;">
							<td><xsl:value-of select="title"/></td>
							<td><xsl:value-of select="link"/></td>
							<td><xsl:value-of select="description"/></td>
						</tr>
					</xsl:for-each>
				</table>
			</body>
		</html>
	</xsl:template>

</xsl:stylesheet>