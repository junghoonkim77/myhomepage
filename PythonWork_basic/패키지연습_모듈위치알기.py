import travel.thailand  #모듈이나 패키지만 import가능하고 클래스등은 바로 가져올수 없다.
trip_to = travel.thailand.ThailandPackage()
trip_to.detail()

from travel import vietnam
trip_to =vietnam.VietnamPackage()
trip_to.detail()

from travel import *
trip_to = vietnam.VietnamPackage() 
trip_to.detail()
## 위에선 에러가 난다 . 왜냐 개발자가 공개하고 싶은 부분만 공개하게 되는거라서 .

#모듈의 경로를 알아 내는 방법 
import inspect
import random
print(inspect.getfile(random))
print(inspect.getfile(thailand))
