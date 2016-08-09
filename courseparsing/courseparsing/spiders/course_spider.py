import scrapy

class courseSpider(scrapy.Spider):
	name = "course"
	allowed_domains = ["swingbyswing.com"]
	start_urls = [

		"https://www.swingbyswing.com/courses/United-States/TX/Austin/Great-Hills-Golf-Course/21495",
		"https://www.swingbyswing.com/courses/United-States/CA/La-Jolla/Torrey-Pines-Golf-Course--South-Course-/20327"

	]

	def parse(self, response):
		for sel in response.xpath('//ul/li'):
			
			name = sel.xpath('//title/text()').extract()
			address = sel.xpath('//a/span[@itemprop="streetAddress"]/text()').extract()
			address = address[1:]
			city = sel.xpath('//a/span[@itemprop="addressLocality"]/text()').extract()
			state = sel.xpath('//a/span[@itemprop="addressRegion"]/text()').extract()
			country = sel.xpath('//a/span[@itemprop="addressCountry"]/text()').extract()
			phone = sel.xpath('//*[@id="content"]/div/div/div[4]/div[2]/div[1]/div[2]/section/div/address/text()').extract()
			website = sel.xpath('//*[@id="content"]/div/div/div[4]/div[2]/div[1]/div[2]/section/div/address/a[2]/text()').extract()
			

			par = sel.xpath('//*[@id="pictures"]/div/div/div/div[2]/section/table/tbody/tr[3]/th/text()').extract()




			print name, address, city, state, country, phone, website, par
