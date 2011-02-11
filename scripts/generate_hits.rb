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

urls = Url.all()
path = urls[rand(urls.size)].path

Curl::Easy.perform("http://192.168.4.110/url/#{path}")