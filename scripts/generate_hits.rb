#!/usr/bin/env ruby

require 'rubygems'
require 'mongo_mapper'
require 'curb'

MongoMapper.database = 'faker'

class Url
  include MongoMapper::Document
  key :path,  String, :required => true
  timestamps!
end

useragents = [
	'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; Origin; .NET CLR 1.0.3705; InfoPath.2; .NET CLR 2.0.50727; .NET CLR 3.0.04506.648; .NET CLR 3.5.21022; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; Origin)',
	'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13 (.NET CLR 3.5.30729) FirePHP/0.5',
	'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/534.13 (KHTML, like Gecko) Chrome/9.0.597.94 Safari/534.13'
]

urls = Url.all()

50.times do |x|
	path = urls[rand(urls.size)].path
	c = Curl::Easy.new("http://192.168.4.110/url2/#{path}")
	c.useragent = useragents[rand(useragents.size)]
	c.perform
end
