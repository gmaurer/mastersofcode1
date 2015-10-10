#!/usr/bin/python
import csv
import json
import sys
import codecs

x = { }
for fn in sys.argv[1:]:
  mon = fn[-6:-4]
  if mon == '14':
      mon = '2014'
  else:
      mon = '2014-' + mon
  with codecs.open(fn, 'rU', encoding='utf-8-sig') as f:
    reader = csv.DictReader(f)
    for r in reader:
      for intify in [ "1B", "2B","3B","AB","BB","CS","G","GDP","H","HBP","HR","IBB","PA","R","RBI","SB","SF","SH","SO","playerid" ]:
             r[intify] = int(r[intify])
      for floatify in [ "AVG" ]:
             r[floatify] = float(r[floatify])
      id = r['playerid']
      if not x.get( id, False ):
             x[ id ] = { }
             x[ id ]['name'] = r['Name']
             x[ id ]['playerid'] = r['playerid']
      x[ id ][ mon ] = r
print "db.players.count();"
print "db.players.remove();"
for id in x:
   print "db.players.insert(%s);" % (json.dumps(x[id],sort_keys=True, indent=4, separators=(',', ': ')))
print "db.players.count();"
