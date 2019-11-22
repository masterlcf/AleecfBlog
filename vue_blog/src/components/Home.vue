<template>
  <el-container class="home-container">
    <!-- 头部 -->
    <el-header>
      <div>
        <img src="../assets/lcf.png"
             style="width:70px;height:70px">
        <span>博客管理后台</span>
      </div>
      <el-button type="info"
                 @click="loginOut">退出</el-button>
    </el-header>
    <el-container>
      <el-aside width="200px">
        <el-menu default-active="2"
                 background-color="#010101"
                 text-color="#fff"
                 active-text-color="#ffd04b">

          <el-submenu :index="item.id + ''"
                      v-for="item in menulist"
                      :key="item.id">
            <template slot="title">
              <i class="el-icon-location"></i>
              <span>{{item.name}}</span>
            </template>

            <el-menu-item :index="subItem.id + ''"
                          v-for="subItem in item.children"
                          :key="subItem.id">
              <template slot="title">
                <i class="el-icon-location"></i>
                <span>{{subItem.name}}</span>
              </template>
            </el-menu-item>

          </el-submenu>

        </el-menu>
      </el-aside>
      <el-main>内容</el-main>
    </el-container>
  </el-container>
</template>
<script>
export default {
  created () {
    this.getMenuList()
  },
  data () {
    return {
      menulist: []
    }
  },
  methods: {
    loginOut () {
      window.sessionStorage.clear('token')
      this.$router.push('/login')
      return true
    },
    getMenuList () {
      var menu = this.$route.params.data.permission
      this.menulist = menu
    }
  }
}
</script>

<style lang="less" scoped>
.home-container {
  height: 100%;
}
.el-header {
  background-color: #010101;
  display: flex;
  justify-content: space-between;
  padding-left: 0;
  align-items: center;
  color: #ffffff;
  font-size: 15px;
  > div {
    display: flex;
    align-items: center;
    span {
      margin-left: 20px;
    }
  }
}
.el-aside {
  background-color: #010101;
}
.el-main {
  background-color: #eadef1;
}
</style>
