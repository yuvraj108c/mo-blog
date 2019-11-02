<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>

            <!-- Link to Semantic UI CDN-->
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.css" />
            <link rel="stylesheet" type="text/css" href="./assets/css/homepage.css" />
            <body>
                <!-- Loop through xml nodes to display posts-->
                <xsl:for-each select="posts/post">
                    <a href="/@id">
                        <div class="ui feed">
                            <div class="event">
                                <div class="label">
                                    <img src="" />
                                </div>
                                <div class="content">
                                    <div class="summary">
                                        <a>
                                            <xsl:value-of select="title" />
                                        </a>

                                        <div class="date"></div>
                                    </div>
                                    <div class="extra text">
                                        <xsl:value-of select="description" />
                                        <div class="label"></div>
                                    </div>
                                    <div class="meta">
                                        <a class="ui red tag label">
                                            <xsl:value-of select="category" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </xsl:for-each>
                <!-- End of Loop-->
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>