#!/usr/bin/python
import csv
import json
import sys
import codecs

for fn in sys.argv[1:]:
  mon = fn[-10:-8]
  with codecs.open(fn, 'rU', encoding='utf-8-sig') as f:
    reader = csv.DictReader(f)
    for r in reader:
        r['month'] = mon
        print json.dumps(r)
