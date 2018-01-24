<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<html>
			<body>
				<table border="1" width="900px" style="margin:20px auto;color:#0000FF">
					<thead>
						<th style="background-color:#CCC;">Naslov</th>
						<th style="background-color:#FFF99f;">Opis</th>
						<th style="background-color:#FF0099;">Link</th>
					</thead>
					<tbody>
					<xsl:for-each select="rss/channel/item">
						<tr style="text-align:center">
							<td style="background-color:#CCC;"><xsl:value-of select="title"/></td>
							<td style="background-color:#FFF99f;"><xsl:value-of select="description"/></td>
							<td style="background-color:#FF0099;"><xsl:value-of select="link"/></td>
						</tr>
					</xsl:for-each>
					</tbody>
				</table>
			</body>
		</html>
	</xsl:template>
</xsl:stylesheet>