#!/usr/bin/python
import csv
import json
import sys
import codecs
import numpy as np

# mu = center = num samples / 2
# sig = st dev = 
def gaussian(x, mu, sig):
    if x > mu:
      return 2.0 - gaussian(abs(mu-x),mu,sig)
    return np.exp(-np.power(x - mu, 2.) / (2 * np.power(sig, 2.)))

def normalize(midval,points,players,mon):
    retval = [ ]
    points.sort()
    mid = float(len(points))
    c = 0.
    for q in points:
        players[q[1]][mon+'-value'] = gaussian(c/mid, 0.5, 0.4) * midval
        c = c + 1.

x = { }
for fn in sys.argv[1:]:
  mon = fn[-6:-4]
  points = [ ]
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
      # Calculate raw points
      r['points'] = r['1B']*1 + r['2B']*2 + r['3B']*3 + r['HR']*4 + r['R']*1 + r['RBI']*1 + r['SB']*2
      id = r['playerid']
      q = [r['points'], r['playerid']]
      points.append(q)
      if not x.get( id, False ):
             x[ id ] = { }
             x[ id ]['name'] = r['Name']
             x[ id ]['playerid'] = r['playerid']
      x[ id ][ mon ] = r
  normalize(100.,points,x,mon)
  
    
print "db.players.count();"
print "db.players.remove();"
for id in x:
   print "db.players.insert(%s);" % (json.dumps(x[id],sort_keys=True, indent=4, separators=(',', ': ')))
print "db.players.count();"
