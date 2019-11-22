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
        <div class="toggle-button"
             @click="toggleCollapse">
          |||
        </div>
        <el-menu default-active="2"
                 background-color="#010101"
                 text-color="#fff"
                 active-text-color="#409EFF"
                 unique-opened
                 :collapse="isCollapse"
                 :collapse-transition="false">

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
      menulist: [],
      isCollapse: false
    }
  },
  methods: {
    loginOut () {
      window.sessionStorage.clear('token')
      this.$router.push('/login')
      return true
    },
    async getMenuList () {
      const { data: res } = await this.$http.get('admin/home')
      this.menulist = res.data.permission
    },
    toggleCollapse () {
      this.isCollapse = !this.isCollapse
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
  .el-menu {
    border-right: none;
  }
}
.el-main {
  background-color: #eadef1;
}
.toggle-button {
  background-color: #4a5064;
  font-size: 10px;
  line-height: 24px;
  color: #ffffff;
  text-align: center;
  letter-spacing: 0.2em;
  cursor: pointer;
}
</style>
